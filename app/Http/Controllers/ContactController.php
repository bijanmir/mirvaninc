<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
            'service' => 'required|string',
            'budget' => 'required|string',
            'message' => 'required|string|max:1000'
        ]);
        
        // Log the submission (you can save to database later)
        Log::info('Contact form submission:', $validated);
        
        // Send email notification (if mail is configured)
        try {
            // Admin notification email
            Mail::send('emails.contact-admin', ['data' => $validated], function ($message) use ($validated) {
                $message->to(config('site.contact.email'))
                        ->subject('New Contact Form Submission from ' . $validated['first_name'] . ' ' . $validated['last_name']);
            });
            
            // User confirmation email
            Mail::send('emails.contact-user', ['data' => $validated], function ($message) use ($validated) {
                $message->to($validated['email'])
                        ->subject('Thank you for contacting ' . config('site.name'));
            });
        } catch (\Exception $e) {
            // Log error but don't fail the request
            Log::error('Failed to send contact emails: ' . $e->getMessage());
        }
        
        // Redirect back with success message
        return redirect()->route('contact')
            ->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours.');
    }
}