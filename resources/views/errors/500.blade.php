{{-- resources/views/errors/500.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="text-center">
        <div class="mb-8">
            <i class="fas fa-exclamation-triangle text-6xl text-red-500"></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Something went wrong</h1>
        <p class="text-xl text-gray-600 mb-8">We're working to fix this issue</p>
        <div class="space-x-4">
            <a href="{{ route('home') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition">
                Go Home
            </a>
            <a href="{{ route('contact') }}" class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded-full hover:bg-indigo-600 hover:text-white transition">
                Contact Support
            </a>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/errors/503.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="text-center">
        <div class="mb-8">
            <i class="fas fa-tools text-6xl text-yellow-500"></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Under Maintenance</h1>
        <p class="text-xl text-gray-600 mb-8">We'll be back shortly</p>
        <p class="text-gray-500">Follow us on social media for updates</p>
    </div>
</div>
@endsection