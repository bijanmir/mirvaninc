
{{-- resources/views/pages/careers.blade.php --}}
@extends('layouts.app')

@section('title', 'Careers - ' . config('site.name'))
@section('description', 'Join our team at ' . config('site.name') . '. We\'re hiring talented individuals to help build the future of technology.')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-green-600 to-teal-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Join Our Team</h1>
                <p class="text-xl md:text-2xl text-green-100">
                    Help us build the future of technology while growing your career
                </p>
            </div>
        </div>
    </section>
    
    {{-- Culture Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-6">Why Work at {{ config('site.name') }}?</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        We're more than just a technology company. We're a team of passionate individuals 
                        who believe in creating meaningful solutions that transform businesses and improve lives.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <i class="fas fa-rocket text-green-600 text-2xl mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-2">Growth Opportunities</h4>
                                <p class="text-gray-600">Continuous learning budget, conference attendance, and clear career progression paths.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-balance-scale text-green-600 text-2xl mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-2">Work-Life Balance</h4>
                                <p class="text-gray-600">Flexible hours, remote work options, and unlimited PTO policy.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-users text-green-600 text-2xl mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-2">Amazing Team</h4>
                                <p class="text-gray-600">Work alongside industry experts and thought leaders in a collaborative environment.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-star text-green-600 text-2xl mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-2">Competitive Benefits</h4>
                                <p class="text-gray-600">Health, dental, vision, 401(k) matching, and equity participation.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&h=300&fit=crop" 
                         alt="Team collaboration" 
                         class="rounded-xl shadow-lg">
                    <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=300&h=300&fit=crop" 
                         alt="Office culture" 
                         class="rounded-xl shadow-lg mt-8">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&h=300&fit=crop" 
                         alt="Team celebration" 
                         class="rounded-xl shadow-lg">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=300&h=300&fit=crop" 
                         alt="Team meeting" 
                         class="rounded-xl shadow-lg mt-8">
                </div>
            </div>
        </div>
    </section>
    
    {{-- Open Positions --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Open Positions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We're always looking for talented individuals to join our growing team
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto space-y-6">
                @foreach($openings as $opening)
                    <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col md:flex-row md:items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center mb-2">
                                    <h3 class="text-2xl font-semibold">{{ $opening['title'] }}</h3>
                                    <span class="ml-4 bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $opening['type'] }}
                                    </span>
                                </div>
                                <div class="flex items-center text-gray-600 mb-3">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>{{ $opening['location'] }}</span>
                                    <span class="mx-3">•</span>
                                    <span>{{ $opening['department'] }}</span>
                                </div>
                                <p class="text-gray-600">{{ $opening['description'] }}</p>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6">
                                <a href="{{ route('contact') }}?subject=Application: {{ urlencode($opening['title']) }}" 
                                   class="bg-green-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-700 transition">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                {{-- No openings message --}}
                @if(empty($openings))
                    <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                        <i class="fas fa-briefcase text-6xl text-gray-300 mb-6"></i>
                        <h3 class="text-2xl font-semibold text-gray-600 mb-4">No Current Openings</h3>
                        <p class="text-gray-500 mb-6">
                            We don't have any open positions right now, but we're always interested in connecting with talented individuals.
                        </p>
                        <a href="{{ route('contact') }}?subject=General Application" 
                           class="bg-green-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-700 transition">
                            Send Resume
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    
    {{-- Benefits Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Benefits & Perks</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We believe in taking care of our team members
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-heart text-4xl text-red-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Health & Wellness</h3>
                    <p class="text-gray-600">Comprehensive health, dental, and vision insurance plus wellness programs.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-piggy-bank text-4xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Financial Security</h3>
                    <p class="text-gray-600">401(k) matching, equity participation, and competitive salary packages.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-umbrella-beach text-4xl text-blue-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Time Off</h3>
                    <p class="text-gray-600">Unlimited PTO, paid holidays, and sabbatical opportunities.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-graduation-cap text-4xl text-purple-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Learning & Development</h3>
                    <p class="text-gray-600">$5,000 annual learning budget, conference tickets, and certification support.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-home text-4xl text-indigo-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Flexible Work</h3>
                    <p class="text-gray-600">Remote work options, flexible hours, and modern office spaces.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-pizza-slice text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Fun Perks</h3>
                    <p class="text-gray-600">Catered lunches, team events, game room, and annual company retreats.</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-green-600 to-teal-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Join Our Team?</h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                Even if you don't see a perfect match above, we'd love to hear from you
            </p>
            <a href="{{ route('contact') }}" 
               class="bg-white text-green-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                Get in Touch
            </a>
        </div>
    </section>
@endsection