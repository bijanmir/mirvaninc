<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Admin') - {{ config('site.name') }} Admin</title>
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    {{-- Custom Admin Styles --}}
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-link:hover {
            background-color: rgba(79, 70, 229, 0.1);
            color: rgb(79, 70, 229);
        }
        .sidebar-link.active {
            background-color: rgba(79, 70, 229, 0.1);
            color: rgb(79, 70, 229);
            border-left: 3px solid rgb(79, 70, 229);
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        {{-- Sidebar --}}
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
             class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
            
            {{-- Logo --}}
            <div class="flex items-center justify-between h-16 px-6 bg-indigo-600">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                    {{ config('site.name') }} Admin
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            {{-- Navigation --}}
            <nav class="mt-6">
                <div class="px-4 space-y-1">
                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center px-3 py-2 text-sm font-medium rounded-lg transition">
                        <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                        Dashboard
                    </a>
                    
                    {{-- Contacts --}}
                    <a href="{{ route('admin.contacts.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }} flex items-center px-3 py-2 text-sm font-medium rounded-lg transition">
                        <i class="fas fa-address-book w-5 mr-3"></i>
                        Contacts
                        @php
                            $newContacts = \App\Models\Contact::where('status', 'new')->count();
                        @endphp
                        @if($newContacts > 0)
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $newContacts }}</span>
                        @endif
                    </a>
                    
                    {{-- Blog Posts --}}
                    <a href="{{ route('admin.blog.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }} flex items-center px-3 py-2 text-sm font-medium rounded-lg transition">
                        <i class="fas fa-blog w-5 mr-3"></i>
                        Blog Posts
                    </a>
                    
                    {{-- Portfolio --}}
                    <a href="{{ route('admin.portfolio.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }} flex items-center px-3 py-2 text-sm font-medium rounded-lg transition">
                        <i class="fas fa-briefcase w-5 mr-3"></i>
                        Portfolio
                    </a>
                    
                    {{-- Separator --}}
                    <hr class="my-4">
                    
                    {{-- View Site --}}
                    <a href="{{ route('home') }}" target="_blank" 
                       class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 transition">
                        <i class="fas fa-external-link-alt w-5 mr-3"></i>
                        View Site
                    </a>
                </div>
            </nav>
        </div>
        
        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Bar --}}
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between h-16 px-6">
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <h1 class="text-2xl font-semibold text-gray-800">
                        @yield('page-title', 'Dashboard')
                    </h1>
                    
                    {{-- User Dropdown --}}
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" 
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                            <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-white mr-2">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            {{ auth()->user()->name }}
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        
                        <div x-show="dropdownOpen" 
                             x-cloak
                             @click.away="dropdownOpen = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user-circle mr-2"></i>Profile
                            </a>
                            <hr class="my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            
            {{-- Page Content --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    {{-- Alerts --}}
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>