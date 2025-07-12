{{-- resources/views/pages/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us - ' . config('site.name'))
@section('description', 'Get in touch with ' . config('site.name') . ' for custom applications, websites, and digital marketing services. Located in La Jolla, CA.')

@push('head')
    {{-- Leaflet CSS for map --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map { 
            height: 400px; 
            border-radius: 1rem;
            z-index: 1;
        }
        .leaflet-container {
            font-family: inherit;
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Let's Work Together</h1>
                <p class="text-xl md:text-2xl text-indigo-100">
                    Ready to transform your business? We'd love to hear about your project.
                </p>
            </div>
        </div>
    </section>
    
    {{-- Contact Information & Form --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12">
                {{-- Contact Information --}}
                <div>
                    <h2 class="text-3xl font-bold mb-8">Get in Touch</h2>
                    
                    <div class="space-y-6 mb-8">
                        {{-- Address --}}
                        <div class="flex items-start">
                            <div class="bg-indigo-100 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Office Location</h3>
                                <p class="text-gray-600">
                                    {{ config('site.contact.address.street') }}<br>
                                    {{ config('site.contact.address.city') }}, {{ config('site.contact.address.state') }} {{ config('site.contact.address.zip') }}
                                </p>
                            </div>
                        </div>
                        
                        {{-- Phone --}}
                        <div class="flex items-start">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Phone</h3>
                                <p class="text-gray-600">{{ config('site.contact.phone') }}</p>
                                <p class="text-sm text-gray-500">{{ config('site.contact.hours') }}</p>
                            </div>
                        </div>
                        
                        {{-- Email --}}
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg mb-1">Email</h3>
                                <p class="text-gray-600">{{ config('site.contact.email') }}</p>
                                <p class="text-sm text-gray-500">We'll respond within 24 hours</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Quick Response Time --}}
                    <div class="bg-indigo-50 p-6 rounded-2xl">
                        <h3 class="font-semibold text-lg mb-2">Fast Response Guaranteed</h3>
                        <p class="text-gray-600 mb-4">We understand your time is valuable. Our team responds to all inquiries within 24 hours.</p>
                        <div class="flex items-center gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-indigo-600">< 1hr</div>
                                <div class="text-sm text-gray-600">Urgent Requests</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600">< 24hr</div>
                                <div class="text-sm text-gray-600">General Inquiries</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Contact Form --}}
                <div>
                    <div class="bg-white p-8 rounded-2xl shadow-xl">
                        <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>
                        
                        <form action="{{ route('contact.submit') }}" method="POST" x-data="{ loading: false }" @submit="loading = true">
                            @csrf
                            
                            {{-- Success Message --}}
                            @if(session('success'))
                                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            {{-- Error Messages --}}
                            @if($errors->any())
                                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                                    <ul class="list-disc list-inside">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <div class="grid md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone (Optional)</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Service Interest *</label>
                                <select name="service" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option value="">Select a service</option>
                                    @foreach(config('site.services') as $key => $service)
                                        <option value="{{ $key }}" {{ old('service') == $key ? 'selected' : '' }}>
                                            {{ $service['title'] }}
                                        </option>
                                    @endforeach
                                    <option value="multiple" {{ old('service') == 'multiple' ? 'selected' : '' }}>Multiple Services</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Project Budget *</label>
                                <select name="budget" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option value="">Select budget range</option>
                                    <option value="5k-10k" {{ old('budget') == '5k-10k' ? 'selected' : '' }}>$5,000 - $10,000</option>
                                    <option value="10k-25k" {{ old('budget') == '10k-25k' ? 'selected' : '' }}>$10,000 - $25,000</option>
                                    <option value="25k-50k" {{ old('budget') == '25k-50k' ? 'selected' : '' }}>$25,000 - $50,000</option>
                                    <option value="50k-100k" {{ old('budget') == '50k-100k' ? 'selected' : '' }}>$50,000 - $100,000</option>
                                    <option value="100k+" {{ old('budget') == '100k+' ? 'selected' : '' }}>$100,000+</option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                                <textarea name="message" rows="4" required
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                          placeholder="Tell us about your project...">{{ old('message') }}</textarea>
                            </div>
                            
                            <button type="submit" 
                                    :disabled="loading"
                                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!loading">Send Message</span>
                                <span x-show="loading" x-cloak class="flex items-center justify-center">
                                    <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Sending...
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Interactive Map --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">Find Us in La Jolla</h2>
                <p class="text-gray-600">Located in the heart of San Diego's tech hub</p>
            </div>
            
            <div class="rounded-2xl overflow-hidden shadow-xl">
                <div id="map"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 mt-12">
                <div class="text-center">
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <h3 class="font-semibold text-lg mb-2">By Car</h3>
                        <p class="text-gray-600">Free parking available. 5 minutes from I-5.</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <h3 class="font-semibold text-lg mb-2">By Public Transit</h3>
                        <p class="text-gray-600">Bus lines 30, 101 stop nearby. Coaster station 10 min away.</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <h3 class="font-semibold text-lg mb-2">From Airport</h3>
                        <p class="text-gray-600">15 minutes from San Diego International (SAN)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- FAQ Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>
                
                <div x-data="{ activeAccordion: null }" class="space-y-4">
                    <div class="border border-gray-200 rounded-lg">
                        <button @click="activeAccordion = activeAccordion === 1 ? null : 1"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">What is your typical project timeline?</span>
                            <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': activeAccordion === 1}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 1" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">Project timelines vary based on scope, but typically: websites take 4-8 weeks, custom applications 3-6 months, and digital marketing campaigns can launch within 2 weeks.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button @click="activeAccordion = activeAccordion === 2 ? null : 2"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">Do you work with businesses outside San Diego?</span>
                            <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': activeAccordion === 2}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 2" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">Yes! While we're based in La Jolla, we work with clients nationwide and internationally. We use modern collaboration tools to ensure seamless communication regardless of location.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button @click="activeAccordion = activeAccordion === 3 ? null : 3"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">What is your payment structure?</span>
                            <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': activeAccordion === 3}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 3" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">We offer flexible payment options including project-based pricing, monthly retainers, and milestone-based payments. We accept payments via Stripe, wire transfer, and ACH.</p>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg">
                        <button @click="activeAccordion = activeAccordion === 4 ? null : 4"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">Do you provide ongoing support?</span>
                            <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': activeAccordion === 4}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeAccordion === 4" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">Absolutely! We offer comprehensive support packages including maintenance, updates, optimization, and 24/7 monitoring for critical applications.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- Leaflet JS for map --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize Leaflet map
        document.addEventListener('DOMContentLoaded', function() {
            // La Jolla coordinates from config
            const lat = {{ config('site.contact.address.coordinates.latitude') }};
            const lng = {{ config('site.contact.address.coordinates.longitude') }};
            
            // Create map
            const map = L.map('map').setView([lat, lng], 14);
            
            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            // Add marker
            const marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup(`
                <b>{{ config('site.name') }}</b><br>
                {{ config('site.contact.address.street') }}<br>
                {{ config('site.contact.address.city') }}, {{ config('site.contact.address.state') }} {{ config('site.contact.address.zip') }}
            `).openPopup();
            
            // Add circle to highlight area
            L.circle([lat, lng], {
                color: '#4F46E5',
                fillColor: '#6366F1',
                fillOpacity: 0.1,
                radius: 500
            }).addTo(map);
        });
    </script>
@endpush