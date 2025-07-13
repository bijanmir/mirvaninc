@extends('layouts.admin')

@section('title', 'Contact Details')
@section('page-title', 'Contact Details')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.contacts.index') }}" class="text-indigo-600 hover:text-indigo-900">
            <i class="fas fa-arrow-left mr-2"></i>Back to Contacts
        </a>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Contact Information --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <p class="text-gray-900">{{ $contact->full_name }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <p class="text-gray-900">
                            <a href="mailto:{{ $contact->email }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ $contact->email }}
                            </a>
                        </p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <p class="text-gray-900">
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ $contact->phone }}
                                </a>
                            @else
                                <span class="text-gray-500">Not provided</span>
                            @endif
                        </p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Service Interest</label>
                        <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $contact->service)) }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Budget Range</label>
                        <p class="text-gray-900 font-semibold">${{ $contact->budget }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Submitted</label>
                        <p class="text-gray-900">
                            {{ $contact->created_at->format('F j, Y \a\t g:i A') }}
                            <span class="text-gray-500 text-sm">({{ $contact->created_at->diffForHumans() }})</span>
                        </p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                    <div class="bg-gray-50 rounded-md p-4">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                    </div>
                </div>
                
                {{-- Quick Actions --}}
                <div class="flex space-x-3">
                    <a href="mailto:{{ $contact->email }}" 
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        <i class="fas fa-envelope mr-2"></i>Send Email
                    </a>
                    @if($contact->phone)
                        <a href="tel:{{ $contact->phone }}" 
                           class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                            <i class="fas fa-phone mr-2"></i>Call
                        </a>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Status and Notes --}}
        <div>
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Notes</h3>
                
                <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $contact->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="qualified" {{ $contact->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                            <option value="proposal_sent" {{ $contact->status === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                            <option value="closed_won" {{ $contact->status === 'closed_won' ? 'selected' : '' }}>Closed Won</option>
                            <option value="closed_lost" {{ $contact->status === 'closed_lost' ? 'selected' : '' }}>Closed Lost</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Internal Notes</label>
                        <textarea name="notes" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                  placeholder="Add notes about this contact...">{{ $contact->notes }}</textarea>
                    </div>
                    
                    <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        Update Status
                    </button>
                </form>
            </div>
            
            {{-- Contact Timeline --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Timeline</h3>
                
                <div class="space-y-3">
                    @if($contact->contacted_at)
                        <div class="flex items-start">
                            <div class="bg-blue-100 rounded-full p-2 mr-3">
                                <i class="fas fa-phone text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Contacted</p>
                                <p class="text-sm text-gray-500">{{ $contact->contacted_at->format('M d, Y g:i A') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    <div class="flex items-start">
                        <div class="bg-green-100 rounded-full p-2 mr-3">
                            <i class="fas fa-envelope text-green-600 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Form Submitted</p>
                            <p class="text-sm text-gray-500">{{ $contact->created_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Delete Contact --}}
            <div class="mt-6">
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Are you sure you want to delete this contact? This action cannot be undone.')"
                            class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                        <i class="fas fa-trash mr-2"></i>Delete Contact
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection