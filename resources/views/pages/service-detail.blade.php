{{-- resources/views/pages/service-detail.blade.php --}}
@extends('layouts.app')

@section('title', $service['title'] . ' - ' . config('site.name'))
@section('description', $service['description'])

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-{{ $service['color'] }}-600 to-{{ $service['color'] }}-700 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <div class="w-20 h-20 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-6">
                    @if($service['icon'] == 'code')
                        <i class="fas fa-code text-3xl"></i>
                    @elseif($service['icon'] == 'desktop')
                        <i class="fas fa-laptop text-3xl"></i>
                    @elseif($service['icon'] == 'chart')
                        <i class="fas fa-chart-line text-3xl"></i>
                    @else
                        <i class="fas fa-rocket text-3xl"></i>
                    @endif
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">{{ $service['title'] }}</h1>
                <p class="text-xl md:text-2xl text-{{ $service['color'] }}-100">
                    {{ $service['description'] }}
                </p>
            </div>
        </div>
    </section>
    
    {{-- Features Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">What's Included</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($service['features'] as $feature)
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-{{ $service['color'] }}-600 mt-1 mr-4"></i>
                            <span class="text-lg">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-{{ $service['color'] }}-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Let's discuss your {{ strtolower($service['title']) }} needs and create a custom solution for your business.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}?service={{ $key }}" 
                   class="bg-{{ $service['color'] }}-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-{{ $service['color'] }}-700 transition">
                    Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="{{ route('portfolio') }}" 
                   class="border-2 border-{{ $service['color'] }}-600 text-{{ $service['color'] }}-600 px-8 py-4 rounded-full font-semibold hover:bg-{{ $service['color'] }}-600 hover:text-white transition">
                    View Examples <i class="fas fa-eye ml-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection