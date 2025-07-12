{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', config('site.seo.default_title'))
@section('description', config('site.seo.default_description'))

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-blue-900 to-purple-800 min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-6 relative z-10 pt-20">
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                    Transform Your Business with Enterprise-Grade Technology
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-8">
                    From Fortune 500 companies to ambitious startups, we deliver custom applications, stunning websites, and results-driven digital marketing that elevates your digital presence.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition transform hover:scale-105 text-center">
                        Schedule Free Consultation
                    </a>
                    <a href="{{ route('portfolio') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-indigo-600 transition text-center">
                        View Our Work
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Client Logos Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <p class="text-center text-gray-600 mb-8">Trusted by Industry Leaders</p>
            <div class="flex flex-wrap justify-center items-center gap-12">
                @foreach(config('site.clients') as $client)
                    <div class="text-3xl font-bold text-gray-400 hover:text-gray-600 transition">{{ $client }}</div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- Services Section --}}
    <section id="services" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We combine technical excellence with creative innovation to deliver solutions that drive real business results.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach(config('site.services') as $key => $service)
                    <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-{{ $service['color'] }}-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-{{ $service['color'] }}-600 transition">
                            @if($service['icon'] == 'code')
                                <svg class="w-8 h-8 text-{{ $service['color'] }}-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            @elseif($service['icon'] == 'desktop')
                                <svg class="w-8 h-8 text-{{ $service['color'] }}-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @elseif($service['icon'] == 'chart')
                                <svg class="w-8 h-8 text-{{ $service['color'] }}-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            @else
                                <svg class="w-8 h-8 text-{{ $service['color'] }}-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-semibold mb-3">{{ $service['title'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                        <a href="{{ route('services.' . $key) }}" class="text-{{ $service['color'] }}-600 font-semibold hover:text-{{ $service['color'] }}-700 flex items-center gap-2">
                            Learn More 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- Process Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our Process</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    A proven methodology that ensures project success from concept to launch
                </p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                @foreach(config('site.process') as $step)
                    <div class="text-center">
                        <div class="w-20 h-20 bg-{{ $step['color'] }}-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">
                            {{ $step['number'] }}
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $step['title'] }}</h3>
                        <p class="text-gray-600">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- Stats Section --}}
    <section class="py-20 bg-indigo-600">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 text-center text-white">
                <div>
                    <div class="text-5xl font-bold mb-2">{{ config('site.stats.projects_completed') }}</div>
                    <div class="text-indigo-100">Projects Delivered</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">{{ config('site.stats.client_satisfaction') }}</div>
                    <div class="text-indigo-100">Client Satisfaction</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">{{ config('site.stats.years_experience') }}</div>
                    <div class="text-indigo-100">Years Experience</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">{{ config('site.stats.support_availability') }}</div>
                    <div class="text-indigo-100">Support Available</div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Testimonials Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">What Our Clients Say</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Don't just take our word for it - hear from the companies we've helped succeed
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @foreach(config('site.testimonials') as $testimonial)
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <div class="flex mb-4">
                            @for($star = 0; $star < $testimonial['rating']; $star++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 mb-6">"{{ $testimonial['content'] }}"</p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                            <div>
                                <div class="font-semibold">{{ $testimonial['name'] }}</div>
                                <div class="text-sm text-gray-500">{{ $testimonial['position'] }}, {{ $testimonial['company'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Transform Your Business?
            </h2>
            <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                Join the ranks of industry leaders who trust {{ config('site.name') }} with their digital success
            </p>
            <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition transform hover:scale-105 inline-block">
                Start Your Project Today
            </a>
        </div>
    </section>
@endsection