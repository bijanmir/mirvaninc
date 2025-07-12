{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('site.seo.default_title'))</title>
    <meta name="description" content="@yield('description', config('site.seo.default_description'))">
    
    {{-- Open Graph / Social Media Tags --}}
    <meta property="og:title" content="@yield('og_title', config('site.name') . ' - Premium Technology Services')">
    <meta property="og:description" content="@yield('og_description', config('site.description'))">
    <meta property="og:image" content="@yield('og_image', asset(config('site.seo.og_image')))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    {{-- Tailwind CSS from CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    {{-- Custom Styles --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    {{-- Additional Head Content --}}
    @stack('head')
</head>
<body class="font-sans antialiased bg-white">
    {{-- Header --}}
    <header x-data="{ isOpen: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="{ 'bg-white shadow-lg': scrolled, 'bg-white/90 backdrop-blur-sm': !scrolled }"
            class="fixed w-full z-50 transition-all duration-300">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                {{-- Logo --}}
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
                        {{ config('site.name') }}
                    </a>
                </div>
                
                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('services') }}" 
                       class="text-gray-700 hover:text-indigo-600 transition {{ request()->routeIs('services*') ? 'text-indigo-600 font-semibold' : '' }}">
                        Services
                    </a>
                    <a href="{{ route('portfolio') }}" 
                       class="text-gray-700 hover:text-indigo-600 transition {{ request()->routeIs('portfolio*') ? 'text-indigo-600 font-semibold' : '' }}">
                        Portfolio
                    </a>
                    <a href="{{ route('about') }}" 
                       class="text-gray-700 hover:text-indigo-600 transition {{ request()->routeIs('about') ? 'text-indigo-600 font-semibold' : '' }}">
                        About
                    </a>
                    <a href="{{ route('blog.index') }}" 
                       class="text-gray-700 hover:text-indigo-600 transition {{ request()->routeIs('blog*') ? 'text-indigo-600 font-semibold' : '' }}">
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="text-gray-700 hover:text-indigo-600 transition {{ request()->routeIs('contact') ? 'text-indigo-600 font-semibold' : '' }}">
                        Contact
                    </a>
                    <a href="{{ route('pricing') }}" 
                       class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition">
                        Get Started
                    </a>
                </div>
                
                {{-- Mobile menu button --}}
                <button @click="isOpen = !isOpen" class="lg:hidden text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="isOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            {{-- Mobile Navigation --}}
            <div x-show="isOpen" 
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="lg:hidden mt-4 pb-4 bg-white rounded-lg shadow-lg">
                <a href="{{ route('services') }}" class="block py-2 px-4 {{ request()->routeIs('services*') ? 'text-indigo-600 font-semibold' : 'text-gray-700' }} hover:text-indigo-600">Services</a>
                <a href="{{ route('portfolio') }}" class="block py-2 px-4 {{ request()->routeIs('portfolio*') ? 'text-indigo-600 font-semibold' : 'text-gray-700' }} hover:text-indigo-600">Portfolio</a>
                <a href="{{ route('about') }}" class="block py-2 px-4 {{ request()->routeIs('about') ? 'text-indigo-600 font-semibold' : 'text-gray-700' }} hover:text-indigo-600">About</a>
                <a href="{{ route('blog.index') }}" class="block py-2 px-4 {{ request()->routeIs('blog*') ? 'text-indigo-600 font-semibold' : 'text-gray-700' }} hover:text-indigo-600">Blog</a>
                <a href="{{ route('contact') }}" class="block py-2 px-4 {{ request()->routeIs('contact') ? 'text-indigo-600 font-semibold' : 'text-gray-700' }} hover:text-indigo-600">Contact</a>
                <a href="{{ route('pricing') }}" class="mt-4 mx-4 block bg-indigo-600 text-white text-center px-6 py-2 rounded-full hover:bg-indigo-700 transition">
                    Get Started
                </a>
            </div>
        </nav>
    </header>
    
    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>
    
    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">{{ config('site.name') }}</h3>
                    <p class="text-gray-400">{{ config('site.tagline') }}</p>
                    <div class="mt-4 flex space-x-4">
                        @if(config('site.social.facebook'))
                            <a href="{{ config('site.social.facebook') }}" class="text-gray-400 hover:text-white transition" target="_blank" rel="noopener">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        @endif
                        @if(config('site.social.twitter'))
                            <a href="{{ config('site.social.twitter') }}" class="text-gray-400 hover:text-white transition" target="_blank" rel="noopener">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                        @endif
                        @if(config('site.social.linkedin'))
                            <a href="{{ config('site.social.linkedin') }}" class="text-gray-400 hover:text-white transition" target="_blank" rel="noopener">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('services.applications') }}" class="hover:text-white transition">Custom Applications</a></li>
                        <li><a href="{{ route('services.websites') }}" class="hover:text-white transition">Website Development</a></li>
                        <li><a href="{{ route('services.marketing') }}" class="hover:text-white transition">Digital Marketing</a></li>
                        <li><a href="{{ route('services.transformation') }}" class="hover:text-white transition">Digital Transformation</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('portfolio') }}" class="hover:text-white transition">Portfolio</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                        <li><a href="{{ route('careers') }}" class="hover:text-white transition">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <address class="not-italic text-gray-400">
                        <p>{{ config('site.contact.address.street') }}</p>
                        <p>{{ config('site.contact.address.city') }}, {{ config('site.contact.address.state') }} {{ config('site.contact.address.zip') }}</p>
                        <p class="mt-2">
                            <a href="mailto:{{ config('site.contact.email') }}" class="hover:text-white transition">{{ config('site.contact.email') }}</a>
                        </p>
                        <p>
                            <a href="tel:{{ config('site.contact.phone_link') }}" class="hover:text-white transition">{{ config('site.contact.phone') }}</a>
                        </p>
                    </address>
                    <div class="mt-4">
                        <a href="{{ route('contact') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition">
                            Get in Touch
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; {{ date('Y') }} {{ config('site.name') }}. All rights reserved.
                    </p>
                    <div class="mt-4 md:mt-0 flex space-x-6">
                        <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                        <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                        <a href="{{ route('sitemap') }}" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    {{-- Scripts --}}
    @stack('scripts')
</body>
</html>