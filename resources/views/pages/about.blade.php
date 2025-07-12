{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Us - ' . config('site.name'))
@section('description', 'Learn about ' . config('site.name') . ', a leading technology services company trusted by Fortune 500 companies. Meet our team and discover our story.')

@push('head')
    <style>
        /* Timeline styles */
        .timeline-line {
            background: linear-gradient(to bottom, transparent, #e5e7eb 10%, #e5e7eb 90%, transparent);
        }
        .timeline-dot {
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">About {{ config('site.name') }}</h1>
                <p class="text-xl md:text-2xl text-indigo-100">
                    We're on a mission to transform businesses through innovative technology solutions
                </p>
            </div>
        </div>
    </section>
    
    {{-- Company Overview --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-6">Building Digital Excellence Since 2014</h2>
                    <p class="text-gray-600 mb-6 text-lg">
                        {{ config('site.name') }} was founded with a simple yet powerful vision: to help businesses leverage technology to achieve extraordinary results. What started as a small team of passionate developers has grown into a trusted partner for Fortune 500 companies and innovative startups alike.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Based in beautiful La Jolla, California, we combine the innovation of Silicon Valley with the relaxed creativity of Southern California. Our location inspires us to think differently and deliver solutions that stand out in the digital landscape.
                    </p>
                    <p class="text-gray-600 mb-8">
                        Today, we're proud to have delivered over 150 successful projects, maintained a 98% client satisfaction rate, and built long-lasting partnerships with industry leaders like Infosys, Charles Schwab, and Arrow Electronics.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div class="text-3xl font-bold text-indigo-600 mb-2">{{ config('site.stats.projects_completed') }}</div>
                            <p class="text-gray-600">Projects Delivered</p>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-purple-600 mb-2">{{ config('site.stats.client_satisfaction') }}</div>
                            <p class="text-gray-600">Client Satisfaction</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-2xl p-8">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop" 
                             alt="Team collaboration" 
                             class="rounded-xl shadow-xl">
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-xl shadow-xl max-w-xs">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-quote-left text-indigo-600 text-2xl mr-3"></i>
                            <div class="flex">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600 italic text-sm">
                            "Innovation, integrity, and excellence - these aren't just words to us, they're the foundation of everything we do."
                        </p>
                        <p class="text-gray-800 font-semibold mt-3">- Founder & CEO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Mission, Vision, Values --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Our Core Principles</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    These guiding principles shape every decision we make and every project we deliver
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bullseye text-3xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Our Mission</h3>
                    <p class="text-gray-600">
                        To empower businesses with innovative technology solutions that drive growth, efficiency, and competitive advantage in the digital age.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-eye text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Our Vision</h3>
                    <p class="text-gray-600">
                        To be the most trusted technology partner for businesses seeking to transform their digital presence and achieve extraordinary results.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Our Values</h3>
                    <p class="text-gray-600">
                        Excellence in execution, integrity in relationships, innovation in solutions, and commitment to our clients' success.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Company Timeline --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Our Journey</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    From humble beginnings to industry recognition
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto relative">
                {{-- Timeline line --}}
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full timeline-line"></div>
                
                {{-- Timeline items --}}
                <div class="space-y-12">
                    <div class="flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <h3 class="text-xl font-semibold mb-2">Company Founded</h3>
                            <p class="text-gray-600">Started with a vision to transform businesses through technology</p>
                        </div>
                        <div class="relative">
                            <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold timeline-dot">
                                <i class="fas fa-flag text-sm"></i>
                            </div>
                        </div>
                        <div class="w-5/12 pl-8">
                            <p class="text-gray-500 font-semibold">2014</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <p class="text-gray-500 font-semibold">2016</p>
                        </div>
                        <div class="relative">
                            <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold timeline-dot">
                                <i class="fas fa-users text-sm"></i>
                            </div>
                        </div>
                        <div class="w-5/12 pl-8">
                            <h3 class="text-xl font-semibold mb-2">First Enterprise Client</h3>
                            <p class="text-gray-600">Partnered with our first Fortune 500 company</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <h3 class="text-xl font-semibold mb-2">50+ Projects Milestone</h3>
                            <p class="text-gray-600">Celebrated delivering our 50th successful project</p>
                        </div>
                        <div class="relative">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold timeline-dot">
                                <i class="fas fa-trophy text-sm"></i>
                            </div>
                        </div>
                        <div class="w-5/12 pl-8">
                            <p class="text-gray-500 font-semibold">2018</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <p class="text-gray-500 font-semibold">2020</p>
                        </div>
                        <div class="relative">
                            <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold timeline-dot">
                                <i class="fas fa-award text-sm"></i>
                            </div>
                        </div>
                        <div class="w-5/12 pl-8">
                            <h3 class="text-xl font-semibold mb-2">Industry Recognition</h3>
                            <p class="text-gray-600">Named Top Technology Services Provider</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <h3 class="text-xl font-semibold mb-2">150+ Projects & Growing</h3>
                            <p class="text-gray-600">Continuing to innovate and expand our services</p>
                        </div>
                        <div class="relative">
                            <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold timeline-dot">
                                <i class="fas fa-rocket text-sm"></i>
                            </div>
                        </div>
                        <div class="w-5/12 pl-8">
                            <p class="text-gray-500 font-semibold">Today</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Leadership Team --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Meet Our Leadership Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Passionate experts dedicated to your success
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach(config('site.team') as $member)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <div class="relative h-80 bg-gradient-to-br from-indigo-400 to-purple-600">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($member['name']) }}&size=300&background=6366f1&color=fff" 
                                 alt="{{ $member['name'] }}" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-1">{{ $member['name'] }}</h3>
                            <p class="text-indigo-600 font-medium mb-3">{{ $member['position'] }}</p>
                            <p class="text-gray-600 mb-4">{{ $member['bio'] }}</p>
                            <div class="flex space-x-3">
                                <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                                    <i class="fas fa-envelope text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Extended Team --}}
            <div class="mt-16 text-center">
                <h3 class="text-2xl font-semibold mb-8">Our Extended Team</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-indigo-600 mb-2">25+</div>
                        <p class="text-gray-600">Developers</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-purple-600 mb-2">8</div>
                        <p class="text-gray-600">Designers</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-green-600 mb-2">12</div>
                        <p class="text-gray-600">Marketing Experts</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-orange-600 mb-2">5</div>
                        <p class="text-gray-600">Project Managers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Culture & Benefits --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-6">Life at {{ config('site.name') }}</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        We believe that great work comes from great people who are empowered, inspired, and supported. Our culture is built on collaboration, continuous learning, and celebrating success together.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Work-Life Balance</h4>
                                <p class="text-gray-600 text-sm">Flexible hours and remote work options</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Professional Growth</h4>
                                <p class="text-gray-600 text-sm">Learning budget and career development programs</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Health & Wellness</h4>
                                <p class="text-gray-600 text-sm">Comprehensive health coverage and wellness programs</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Team Building</h4>
                                <p class="text-gray-600 text-sm">Regular team events and annual company retreats</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('careers') }}" class="inline-block mt-8 bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition">
                        Join Our Team <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=300&h=300&fit=crop" 
                         alt="Team meeting" 
                         class="rounded-xl shadow-lg">
                    <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=300&h=300&fit=crop" 
                         alt="Office culture" 
                         class="rounded-xl shadow-lg mt-8">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&h=300&fit=crop" 
                         alt="Team collaboration" 
                         class="rounded-xl shadow-lg">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=300&h=300&fit=crop" 
                         alt="Team celebration" 
                         class="rounded-xl shadow-lg mt-8">
                </div>
            </div>
        </div>
    </section>
    
    {{-- Awards & Recognition --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Awards & Recognition</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our commitment to excellence has been recognized by industry leaders
                </p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-award text-4xl text-yellow-500 mb-4"></i>
                    <h4 class="font-semibold mb-2">Best Tech Company</h4>
                    <p class="text-sm text-gray-600">San Diego Business Journal 2023</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-trophy text-4xl text-indigo-600 mb-4"></i>
                    <h4 class="font-semibold mb-2">Top Web Developer</h4>
                    <p class="text-sm text-gray-600">Clutch.co 2023</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-star text-4xl text-purple-600 mb-4"></i>
                    <h4 class="font-semibold mb-2">5-Star Rated</h4>
                    <p class="text-sm text-gray-600">Google Reviews</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-medal text-4xl text-green-600 mb-4"></i>
                    <h4 class="font-semibold mb-2">Certified Partner</h4>
                    <p class="text-sm text-gray-600">AWS & Google Cloud</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Work with Us?
            </h2>
            <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                Let's create something amazing together. Get in touch to start your project.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                    Get in Touch <i class="fas fa-envelope ml-2"></i>
                </a>
                <a href="{{ route('portfolio') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-indigo-600 transition">
                    View Our Work <i class="fas fa-briefcase ml-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection