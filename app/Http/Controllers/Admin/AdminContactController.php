<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by service
        if ($request->has('service') && $request->service !== 'all') {
            $query->where('service', $request->service);
        }

        // Filter by date range
        if ($request->has('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,qualified,proposal_sent,closed_won,closed_lost',
            'notes' => 'nullable|string'
        ]);

        $contact->update($validated);

        if ($request->status === 'contacted' && !$contact->contacted_at) {
            $contact->update(['contacted_at' => now()]);
        }

        return redirect()->route('admin.contacts.show', $contact)
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        // Apply same filters as index
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        if ($request->has('service') && $request->service !== 'all') {
            $query->where('service', $request->service);
        }

        $contacts = $query->orderBy('created_at', 'desc')->get();

        $csv = "First Name,Last Name,Email,Phone,Service,Budget,Status,Created At\n";
        
        foreach ($contacts as $contact) {
            $csv .= "{$contact->first_name},{$contact->last_name},{$contact->email},{$contact->phone},{$contact->service},{$contact->budget},{$contact->status},{$contact->created_at}\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="contacts-' . date('Y-m-d') . '.csv"');
    }
}