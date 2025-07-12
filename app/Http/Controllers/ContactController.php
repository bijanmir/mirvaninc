<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
            $this->sendNotificationEmails($contact);
            
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
                ->with('error', 'Sorry, there was an issue submitting your message. Please try again or contact us directly.');
        }
    }
    
    /**
     * Handle API contact form submission (for AJAX)
     */
    public function apiSubmit(Request $request)
    {
        // Same validation as regular submit
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
            $contact = Contact::create($validated);
            
            Log::info('API Contact form submission:', ['id' => $contact->id]);
            
            $this->sendNotificationEmails($contact);
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We\'ll get back to you within 24 hours.',
                'reference_id' => $contact->id
            ]);
            
        } catch (\Exception $e) {
            Log::error('API contact submission failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an issue submitting your message. Please try again.'
            ], 500);
        }
    }
    
    /**
     * Send email notifications for contact form
     */
    private function sendNotificationEmails(Contact $contact)
    {
        try {
            // Admin notification email
            Mail::send('emails.contact-admin', ['data' => $contact->toArray()], function ($message) use ($contact) {
                $message->to(config('site.contact.email', 'hello@mirvaninc.com'))
                        ->subject('New Contact Form Submission from ' . $contact->full_name . ' (#' . $contact->id . ')');
            });
            
            // User confirmation email
            Mail::send('emails.contact-user', ['data' => $contact->toArray()], function ($message) use ($contact) {
                $message->to($contact->email)
                        ->subject('Thank you for contacting ' . config('site.name'));
            });
            
            Log::info('Contact form emails sent successfully', ['contact_id' => $contact->id]);
            
        } catch (\Exception $e) {
            // Log error but don't fail the request
            Log::error('Failed to send contact emails: ' . $e->getMessage(), [
                'contact_id' => $contact->id
            ]);
        }
    }
    
    /**
     * Admin method to view contact submissions (for future admin panel)
     */
    public function adminIndex(Request $request)
    {
        $query = Contact::query();
        
        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->byStatus($request->status);
        }
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }
        
        $contacts = $query->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.contacts.index', compact('contacts'));
    }
    
    /**
     * Admin method to view single contact submission
     */
    public function adminShow(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }
    
    /**
     * Admin method to update contact status
     */
    public function adminUpdate(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,qualified,proposal_sent,closed_won,closed_lost',
            'notes' => 'nullable|string'
        ]);
        
        $contact->update($validated);
        
        if ($validated['status'] === 'contacted' && !$contact->contacted_at) {
            $contact->update(['contacted_at' => now()]);
        }
        
        Log::info('Contact status updated', [
            'contact_id' => $contact->id,
            'new_status' => $validated['status']
        ]);
        
        return redirect()->back()->with('success', 'Contact updated successfully.');
    }
}