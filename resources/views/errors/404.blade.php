@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-900">404</h1>
        <p class="text-xl text-gray-600 mt-4">Page not found</p>
        <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-700 mt-4 inline-block">Go back home</a>
    </div>
</div>
@endsection