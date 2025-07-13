<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Mail\ContactAdminNotification;
use App\Mail\ContactUserConfirmation;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index()
    {
        return view('pages.contact');
    }
    
    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => [
                'required',
                'string',
                Rule::in(['applications', 'websites', 'marketing', 'transformation', 'multiple'])
            ],
            'budget' => [
                'required',
                'string',
                Rule::in(['5k-10k', '10k-25k', '25k-50k', '50k-100k', '100k+'])
            ],
            'message' => 'required|string|max:2000'
        ]);
        
        try {
            // Save to database
            $contact = Contact::create($validated);
            
            // Log the submission
            Log::info('Contact form submission saved to database:', [
                'id' => $contact->id,
                'email' => $contact->email,
                'service' => $contact->service
            ]);
            
            // Send email notifications
            $emailSent = $this->sendNotificationEmails($contact);
            
            if (!$emailSent) {
                Log::warning('Contact form saved but emails could not be sent', [
                    'contact_id' => $contact->id
                ]);
                
                // Still show success to user since data was saved
                return redirect()->route('contact')
                    ->with('success', 'Thank you for your message! We\'ve received your inquiry (Reference #' . $contact->id . '). If you don\'t receive a confirmation email, please check your spam folder or contact us directly at ' . config('site.contact.email', 'hello@mirvaninc.com') . '.');
            }
            
            // Redirect back with success message
            return redirect()->route('contact')
                ->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours. Your reference ID is #' . $contact->id . '.');
                
        } catch (\Exception $e) {
            Log::error('Failed to save contact submission: ' . $e->getMessage(), [
                'data' => $validated,
                'error' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('contact')
                ->withInput()
                ->with('error', 'Sorry, there was an issue submitting your message. Please try again or contact us directly at ' . config('site.contact.email', 'hello@mirvaninc.com'));
        }
    }
    
    /**
     * Send email notifications for contact form
     */
    private function sendNotificationEmails(Contact $contact)
    {
        $emailsSent = true;
        
        try {
            // Get the admin email from config or use a default
            $adminEmail = config('site.contact.email', 'hello@mirvaninc.com');
            
            // For ProtonMail, we need to ensure proper headers
            $headers = [
                'X-Priority' => '1',
                'X-MSMail-Priority' => 'High',
                'Importance' => 'High'
            ];
            
            // Admin notification email
            Mail::send('emails.contact-admin', ['contact' => $contact], function ($message) use ($contact, $adminEmail, $headers) {
                $message->to($adminEmail)
                        ->subject('New Contact Form Submission from ' . $contact->full_name . ' (#' . $contact->id . ')')
                        ->replyTo($contact->email, $contact->full_name)
                        ->priority(1);
                
                // Add custom headers
                foreach ($headers as $key => $value) {
                    $message->getHeaders()->addTextHeader($key, $value);
                }
            });
            
            Log::info('Admin notification email sent', [
                'contact_id' => $contact->id,
                'to' => $adminEmail
            ]);
            
            // User confirmation email
            Mail::send('emails.contact-user', ['contact' => $contact], function ($message) use ($contact) {
                $message->to($contact->email, $contact->full_name)
                        ->subject('Thank you for contacting ' . config('site.name', 'Mirvan Inc'))
                        ->priority(3);
            });
            
            Log::info('User confirmation email sent', [
                'contact_id' => $contact->id,
                'to' => $contact->email
            ]);
            
        } catch (\Exception $e) {
            // Log error but don't fail the request
            Log::error('Failed to send contact emails: ' . $e->getMessage(), [
                'contact_id' => $contact->id,
                'error' => $e->getTraceAsString()
            ]);
            $emailsSent = false;
        }
        
        return $emailsSent;
    }
    
    /**
     * Test email configuration (for debugging)
     */
    public function testEmail()
    {
        try {
            $testEmail = config('site.contact.email', 'hello@mirvaninc.com');
            
            // Test with proper headers for ProtonMail
            Mail::raw('This is a test email from your Laravel application. If you receive this, your email configuration is working correctly!', function ($message) use ($testEmail) {
                $message->to($testEmail)
                        ->subject('Test Email from ' . config('site.name', 'Mirvan Inc'))
                        ->from(config('mail.from.address'), config('mail.from.name'))
                        ->priority(3);
            });
            
            // Also test if we can retrieve current configuration
            $mailConfig = [
                'mailer' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'from' => config('mail.from.address'),
                'encryption' => config('mail.mailers.smtp.encryption'),
            ];
            
            return response()->json([
                'success' => true,
                'message' => 'Test email sent successfully to ' . $testEmail,
                'config' => $mailConfig
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send test email: ' . $e->getMessage(),
                'mailer' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'from' => config('mail.from.address'),
                'error_details' => $e->getTraceAsString()
            ], 500);
        }
    }
    
    // ... rest of your controller methods remain the same ...
}