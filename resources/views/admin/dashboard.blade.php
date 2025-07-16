@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="animated-gradient rounded-2xl p-8 text-white shadow-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-white/80">Here's what's happening with your business today.</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-chart-line text-6xl text-white/20"></i>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Projects -->
        <div class="bg-white rounded-xl shadow-lg hover-lift p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-indigo-100 rounded-full opacity-20"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <span class="text-sm text-green-600 font-medium">
                        <i class="fas fa-arrow-up mr-1"></i>12%
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $portfolioCount ?? 24 }}</h3>
                <p class="text-gray-600 text-sm">Total Projects</p>
            </div>
        </div>

        <!-- New Contacts -->
        <div class="bg-white rounded-xl shadow-lg hover-lift p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-100 rounded-full opacity-20"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="text-sm text-green-600 font-medium">
                        <i class="fas fa-arrow-up mr-1"></i>8%
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $contactCount ?? 156 }}</h3>
                <p class="text-gray-600 text-sm">New Contacts</p>
            </div>
        </div>

        <!-- Blog Posts -->
        <div class="bg-white rounded-xl shadow-lg hover-lift p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-pink-100 rounded-full opacity-20"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-blog"></i>
                    </div>
                    <span class="text-sm text-red-600 font-medium">
                        <i class="fas fa-arrow-down mr-1"></i>3%
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $blogCount ?? 48 }}</h3>
                <p class="text-gray-600 text-sm">Blog Posts</p>
            </div>
        </div>

        <!-- Page Views -->
        <div class="bg-white rounded-xl shadow-lg hover-lift p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-100 rounded-full opacity-20"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center text-white">
                        <i class="fas fa-eye"></i>
                    </div>
                    <span class="text-sm text-green-600 font-medium">
                        <i class="fas fa-arrow-up mr-1"></i>24%
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">12.4K</h3>
                <p class="text-gray-600 text-sm">Page Views</p>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Traffic Chart -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Traffic Overview</h3>
                <select class="text-sm border-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 90 days</option>
                </select>
            </div>
            <div class="h-64 flex items-center justify-center">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Recent Activity</h3>
            <div class="space-y-4">
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-envelope text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">New contact form submission</p>
                        <p class="text-xs text-gray-500">John Doe - 5 minutes ago</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-blog text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">New blog post published</p>
                        <p class="text-xs text-gray-500">"10 Web Design Trends" - 2 hours ago</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-briefcase text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Portfolio item updated</p>
                        <p class="text-xs text-gray-500">E-commerce Platform - 1 day ago</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items