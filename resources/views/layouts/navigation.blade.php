{{-- resources/views/layouts/navigation.blade.php --}}
<nav x-data="{ open: false, scrolled: false }" 
     x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 20 })"
     :class="{ 'bg-white shadow-lg': scrolled, 'bg-transparent': !scrolled }"
     class="fixed w-full top-0 z-50 transition-all duration-300">
    
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            {{-- Logo/Brand --}}
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-bold text-xl">M</span>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ config('site.name', 'Mirvan Inc') }}
                    </span>
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center space-x-8">
                {{-- Main Nav Links --}}
                <div class="flex items-center space-x-6">
                    <a href="{{ route('home') }}" 
                       class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-indigo-600' : '' }}">
                        Home
                    </a>
                    
                    {{-- Services Dropdown --}}
                    <div x-data="{ servicesOpen: false }" @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false" class="relative">
                        <a href="{{ route('services') }}" 
                           class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 flex items-center {{ request()->routeIs('services*') ? 'text-indigo-600' : '' }}">
                            Services
                            <svg class="w-4 h-4 ml-1 transition-transform duration-300" :class="{ 'rotate-180': servicesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        
                        {{-- Services Dropdown Menu --}}
                        <div x-show="servicesOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute left-0 mt-2 w-64 bg-white rounded-xl shadow-xl overflow-hidden"
                             x-cloak>
                            <a href="{{ route('services.applications') }}" class="block px-6 py-3 hover:bg-indigo-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-code text-indigo-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Custom Applications</div>
                                        <div class="text-sm text-gray-500">Enterprise software solutions</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('services.websites') }}" class="block px-6 py-3 hover:bg-purple-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-laptop text-purple-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Website Development</div>
                                        <div class="text-sm text-gray-500">Modern, responsive websites</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('services.marketing') }}" class="block px-6 py-3 hover:bg-green-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-line text-green-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Digital Marketing</div>
                                        <div class="text-sm text-gray-500">Data-driven campaigns</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('services.transformation') }}" class="block px-6 py-3 hover:bg-orange-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-rocket text-orange-600 mr-3"></i>
                                    <div>
                                        <div class="font-medium text-gray-900">Digital Transformation</div>
                                        <div class="text-sm text-gray-500">Modernize your business</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <a href="{{ route('portfolio') }}" 
                       class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('portfolio*') ? 'text-indigo-600' : '' }}">
                        Portfolio
                    </a>
                    
                    <a href="{{ route('about') }}" 
                       class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('about') ? 'text-indigo-600' : '' }}">
                        About
                    </a>
                    
                    <a href="{{ route('blog.index') }}" 
                       class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('blog*') ? 'text-indigo-600' : '' }}">
                        Blog
                    </a>
                    
                    <a href="{{ route('pricing') }}" 
                       class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('pricing') ? 'text-indigo-600' : '' }}">
                        Pricing
                    </a>
                </div>
                
                {{-- CTA and Auth Section --}}
                <div class="flex items-center space-x-4">
                    <a href="{{ route('contact') }}" 
                       class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2.5 rounded-full font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        Get Started
                    </a>
                    
                    @auth
                        {{-- User Dropdown --}}
                        <div x-data="{ userOpen: false }" class="relative">
                            <button @click="userOpen = !userOpen" 
                                    class="flex items-center space-x-3 text-gray-700 hover:text-indigo-600 transition-colors duration-300">
                                <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-medium">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': userOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="userOpen" 
                                 @click.away="userOpen = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl overflow-hidden"
                                 x-cloak>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-300">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                                    </a>
                                @endif
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-300">
                                    <i class="fas fa-user-circle mr-2"></i>Profile
                                </a>
                                <hr class="border-gray-200">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-300">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300">
                            <i class="fas fa-lock mr-2"></i>Login
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="lg:hidden">
                <button @click="open = !open" 
                        class="text-gray-700 hover:text-indigo-600 focus:outline-none focus:text-indigo-600 transition-colors duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Navigation Menu --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         class="lg:hidden bg-white shadow-xl"
         x-cloak>
        <div class="px-6 pt-4 pb-6 space-y-3">
            <a href="{{ route('home') }}" 
               class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-indigo-600' : '' }}">
                Home
            </a>
            
            {{-- Mobile Services Dropdown --}}
            <div x-data="{ mobileServicesOpen: false }">
                <button @click="mobileServicesOpen = !mobileServicesOpen" 
                        class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('services*') ? 'text-indigo-600' : '' }}">
                    <span>Services</span>
                    <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': mobileServicesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="mobileServicesOpen" x-transition class="mt-2 ml-4 space-y-2">
                    <a href="{{ route('services') }}" class="block py-2 text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-300">
                        All Services
                    </a>
                    <a href="{{ route('services.applications') }}" class="block py-2 text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-300">
                        <i class="fas fa-code mr-2 text-indigo-500"></i>Custom Applications
                    </a>
                    <a href="{{ route('services.websites') }}" class="block py-2 text-sm text-gray-600 hover:text-purple-600 transition-colors duration-300">
                        <i class="fas fa-laptop mr-2 text-purple-500"></i>Website Development
                    </a>
                    <a href="{{ route('services.marketing') }}" class="block py-2 text-sm text-gray-600 hover:text-green-600 transition-colors duration-300">
                        <i class="fas fa-chart-line mr-2 text-green-500"></i>Digital Marketing
                    </a>
                    <a href="{{ route('services.transformation') }}" class="block py-2 text-sm text-gray-600 hover:text-orange-600 transition-colors duration-300">
                        <i class="fas fa-rocket mr-2 text-orange-500"></i>Digital Transformation
                    </a>
                </div>
            </div>
            
            <a href="{{ route('portfolio') }}" 
               class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('portfolio*') ? 'text-indigo-600' : '' }}">
                Portfolio
            </a>
            
            <a href="{{ route('about') }}" 
               class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('about') ? 'text-indigo-600' : '' }}">
                About
            </a>
            
            <a href="{{ route('blog.index') }}" 
               class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('blog*') ? 'text-indigo-600' : '' }}">
                Blog
            </a>
            
            <a href="{{ route('pricing') }}" 
               class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 {{ request()->routeIs('pricing') ? 'text-indigo-600' : '' }}">
                Pricing
            </a>
            
            <hr class="border-gray-200">
            
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300">
                        <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                    </a>
                @endif
                <a href="{{ route('profile.edit') }}" class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300">
                    <i class="fas fa-user-circle mr-2"></i>Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-3 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300">
                    <i class="fas fa-lock mr-2"></i>Admin Login
                </a>
            @endauth
            
            <a href="{{ route('contact') }}" 
               class="block w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-center py-3 rounded-full font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300 mt-4">
                Get Started
            </a>
        </div>
    </div>
</nav>

{{-- Spacer for fixed navigation --}}
<div class="h-20"></div>

<style>
    [x-cloak] { display: none !important; }
</style>