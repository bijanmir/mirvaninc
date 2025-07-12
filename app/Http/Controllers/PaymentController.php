<?php
// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));
    }
    
    /**
     * Create a Stripe Checkout session
     */
    public function createCheckoutSession(Request $request)
    {
        \Log::info('PaymentController::createCheckoutSession called', [
        'request' => $request->all()
    ]);
    
        $validated = $request->validate([
            'plan' => 'required|in:starter,professional,enterprise',
            'annual' => 'boolean'
        ]);
        
        // Define pricing (in cents)
        $prices = [
            'starter' => [
                'monthly' => 250000, // $2,500
                'annual' => 2000000  // $20,000 ($2,000 x 10 months for annual discount)
            ],
            'professional' => [
                'monthly' => 500000, // $5,000
                'annual' => 4000000  // $40,000 ($4,000 x 10 months for annual discount)
            ]
        ];
        
        $plan = $validated['plan'];
        $isAnnual = $validated['annual'] ?? false;
        
        if ($plan === 'enterprise') {
            return response()->json([
                'error' => 'Enterprise plans require custom pricing. Please contact sales.'
            ], 400);
        }
        
        $amount = $prices[$plan][$isAnnual ? 'annual' : 'monthly'];
        $planName = ucfirst($plan) . ' Plan';
        $billingPeriod = $isAnnual ? 'Annual' : 'Monthly';
        
        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $planName,
                            'description' => $billingPeriod . ' billing - Website development package from ' . config('site.name'),
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel'),
                'metadata' => [
                    'plan' => $plan,
                    'billing_cycle' => $isAnnual ? 'annual' : 'monthly'
                ]
            ]);
            
            return response()->json([
                'sessionId' => $session->id,
                'url' => $session->url
            ]);
            
        } catch (\Exception $e) {
            Log::error('Stripe checkout error: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Unable to create checkout session. Please try again.'
            ], 500);
        }
    }
    
    /**
     * Handle successful payment
     */
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        
        if ($sessionId) {
            try {
                $session = Session::retrieve($sessionId);
                
                // Here you would typically:
                // 1. Save the order to your database
                // 2. Send confirmation emails
                // 3. Create the customer account
                
                return view('payment.success', [
                    'session' => $session
                ]);
            } catch (\Exception $e) {
                Log::error('Error retrieving session: ' . $e->getMessage());
            }
        }
        
        return view('payment.success');
    }
    
    /**
     * Handle cancelled payment
     */
    public function cancel()
    {
        return view('payment.cancel');
    }
    
    /**
     * Handle Stripe webhooks
     */
    public function webhook(Request $request)
    {
        $endpointSecret = config('services.stripe.webhook_secret');
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );
        } catch(\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }
        
        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                // Fulfill the order
                $this->fulfillOrder($session);
                break;
                
            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object;
                // Handle failed payment
                Log::warning('Payment failed for intent: ' . $paymentIntent->id);
                break;
                
            default:
                Log::info('Unhandled webhook event type: ' . $event->type);
        }
        
        return response('Webhook handled', 200);
    }
    
    /**
     * Fulfill the order after successful payment
     */
    private function fulfillOrder($session)
    {
        // Log the successful payment
        Log::info('Payment successful for session: ' . $session->id);
        
        // Here you would typically:
        // 1. Create the project in your database
        // 2. Send confirmation email to customer
        // 3. Notify your team about the new project
        // 4. Set up project management tasks
    }
}