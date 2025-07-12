{{-- resources/views/pages/portfolio-detail.blade.php --}}
@extends('layouts.app')

@section('title', $project->title . ' - Portfolio - ' . config('site.name'))
@section('description', $project->description)

@section('content')
    {{-- Hero Section --}}
    <section class="pt-32 pb-12">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                {{-- Breadcrumbs --}}
                <nav class="text-sm text-gray-500 mb-8">
                    <a href="{{ route('home') }}" class="hover:text-indigo-600">Home</a>
                    <span class="mx-2">→</span>
                    <a href="{{ route('portfolio') }}" class="hover:text-indigo-600">Portfolio</a>
                    <span class="mx-2">→</span>
                    <span class="text-gray-700">{{ $project->title }}</span>
                </nav>
                
                {{-- Project Header --}}
                <div class="grid lg:grid-cols-2 gap-12 items-start">
                    <div>
                        <div class="mb-4">
                            <span class="bg-indigo-100 text-indigo-600 px-4 py-2 rounded-full text-sm font-medium">
                                {{ ucfirst($project->category) }}
                            </span>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-bold mb-6">{{ $project->title }}</h1>
                        <p class="text-xl text-gray-600 mb-8">{{ $project->description }}</p>
                        
                        {{-- Project Details --}}
                        <div class="grid md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Client</h3>
                                <p class="text-gray-600">{{ $project->client_display_name }}</p>
                            </div>
                            @if($project->duration)
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Timeline</h3>
                                <p class="text-gray-600">{{ $project->formatted_duration }}</p>
                            </div>
                            @endif
                            @if($project->project_url)
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Website</h3>
                                <a href="{{ $project->project_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-700">
                                    Visit Live Site <i class="fas fa-external-link-alt ml-1"></i>
                                </a>
                            </div>
                            @endif
                            @if($project->team_size)
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Team Size</h3>
                                <p class="text-gray-600">{{ $project->team_size }} people</p>
                            </div>
                            @endif
                        </div>
                        
                        {{-- Technologies --}}
                        @if($project->technologies && count($project->technologies) > 0)
                        <div class="mb-8">
                            <h3 class="font-semibold text-gray-900 mb-3">Technologies Used</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->technologies as $tech)
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    {{-- Featured Image --}}
                    <div>
                        @if($project->primary_image)
                            <img src="{{ $project->primary_image }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full rounded-2xl shadow-2xl">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Project Content --}}
    @if($project->content)
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto prose prose-lg">
                {!! $project->content !!}
            </div>
        </div>
    </section>
    @endif
    
    {{-- Results Section --}}
    @if($project->results && count($project->results) > 0)
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-12">Results Achieved</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($project->results as $result)
                        <div class="bg-white p-6 rounded-xl shadow-lg">
                            <div class="text-3xl font-bold text-indigo-600 mb-2">{{ $result }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    
    {{-- Testimonial --}}
    @if($project->testimonial)
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <blockquote class="text-2xl italic text-gray-600 mb-8">
                    "{{ $project->testimonial['content'] }}"
                </blockquote>
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <div class="font-semibold">{{ $project->testimonial['author'] }}</div>
                        <div class="text-gray-600">{{ $project->testimonial['position'] }}, {{ $project->testimonial['company'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    {{-- Gallery --}}
    @if($project->gallery_images && count($project->gallery_images) > 0)
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">Project Gallery</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($project->gallery_images as $image)
                        <img src="{{ $image }}" alt="Project Image" class="w-full h-64 object-cover rounded-xl shadow-lg">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    
    {{-- Navigation --}}
    @if($previousProject || $nextProject)
        <section class="py-12">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="grid md:grid-cols-2 gap-8">
                        @if($previousProject)
                            <a href="{{ route('portfolio.show', $previousProject->slug) }}" 
                               class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition group">
                                <p class="text-sm text-gray-500 mb-2">
                                    <i class="fas fa-arrow-left mr-2"></i>Previous Project
                                </p>
                                <h4 class="font-semibold group-hover:text-indigo-600 transition">{{ $previousProject->title }}</h4>
                            </a>
                        @endif
                        
                        @if($nextProject)
                            <a href="{{ route('portfolio.show', $nextProject->slug) }}" 
                               class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition group {{ !$previousProject ? 'md:col-start-2' : '' }}">
                                <p class="text-sm text-gray-500 mb-2">
                                    Next Project<i class="fas fa-arrow-right ml-2"></i>
                                </p>
                                <h4 class="font-semibold group-hover:text-indigo-600 transition">{{ $nextProject->title }}</h4>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    {{-- Related Projects --}}
    @if($relatedProjects && $relatedProjects->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12">Related Projects</h2>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        @foreach($relatedProjects as $related)
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if($related->primary_image)
                                    <div class="h-48 relative">
                                        <img src="{{ $related->primary_image }}" 
                                             alt="{{ $related->title }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                @endif
                                
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-3 hover:text-indigo-600 transition">
                                        <a href="{{ route('portfolio.show', $related->slug) }}">{{ $related->title }}</a>
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-4">{{ $related->description }}</p>
                                    
                                    <a href="{{ route('portfolio.show', $related->slug) }}" 
                                       class="text-indigo-600 font-medium hover:text-indigo-700">
                                        View Project <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Start Your Project?</h2>
            <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                Let's discuss how we can create something amazing for your business
            </p>
            <a href="{{ route('contact') }}" 
               class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                Get Started Today <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>
@endsection