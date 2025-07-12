{{-- resources/views/blog/show.blade.php --}}
@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - ' . config('site.name'))
@section('description', $post->meta_description ?: $post->excerpt)

@push('head')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    @if($post->featured_image)
        <meta property="og:image" content="{{ $post->featured_image }}">
    @endif
    <meta property="og:type" content="article">
    <meta property="article:published_time" content="{{ $post->published_at->toISOString() }}">
    <meta property="article:author" content="{{ $post->author_name }}">
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="pt-32 pb-12">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                {{-- Breadcrumbs --}}
                <nav class="text-sm text-gray-500 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-indigo-600">Home</a>
                    <span class="mx-2">→</span>
                    <a href="{{ route('blog.index') }}" class="hover:text-indigo-600">Blog</a>
                    <span class="mx-2">→</span>
                    <span class="text-gray-700">{{ $post->title }}</span>
                </nav>
                
                {{-- Article Header --}}
                <header class="mb-12">
                    @if($post->category)
                        <div class="mb-4">
                            <a href="{{ route('blog.category', $post->category) }}" 
                               class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm font-medium hover:bg-indigo-200 transition">
                                {{ $post->category }}
                            </a>
                        </div>
                    @endif
                    
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $post->title }}</h1>
                    
                    <div class="flex items-center text-gray-600 mb-6">
                        <div class="flex items-center mr-6">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-indigo-600 font-semibold">{{ substr($post->author_name, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $post->author_name }}</p>
                                <p class="text-sm">{{ $post->formatted_date }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 text-sm">
                            <span><i class="fas fa-clock mr-1"></i>{{ $post->reading_time }} min read</span>
                            @if($post->views > 0)
                                <span><i class="fas fa-eye mr-1"></i>{{ number_format($post->views) }} views</span>
                            @endif
                        </div>
                    </div>
                    
                    @if($post->featured_image)
                        <div class="mb-8">
                            <img src="{{ $post->featured_image }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-64 md:h-96 object-cover rounded-2xl shadow-lg">
                        </div>
                    @endif
                </header>
            </div>
        </div>
    </section>
    
    {{-- Article Content --}}
    <article class="pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg max-w-none">
                    {!! $post->content !!}
                </div>
                
                {{-- Tags --}}
                @if($post->tags && count($post->tags) > 0)
                    <div class="mt-12 pt-8 border-t">
                        <h3 class="text-lg font-semibold mb-4">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <a href="{{ route('blog.tag', $tag) }}" 
                                   class="bg-gray-100 hover:bg-indigo-100 hover:text-indigo-600 px-3 py-1 rounded-full text-sm transition">
                                    {{ $tag }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                {{-- Share Buttons --}}
                <div class="mt-8 pt-8 border-t">
                    <h3 class="text-lg font-semibold mb-4">Share this article</h3>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" 
                           target="_blank" 
                           class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                           target="_blank" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            <i class="fab fa-linkedin mr-2"></i>LinkedIn
                        </a>
                        <button onclick="copyToClipboard()" 
                                class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-link mr-2"></i>Copy Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </article>
    
    {{-- Navigation --}}
    @if($previousPost || $nextPost)
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto">
                    <div class="grid md:grid-cols-2 gap-8">
                        @if($previousPost)
                            <a href="{{ route('blog.show', $previousPost->slug) }}" 
                               class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition group">
                                <p class="text-sm text-gray-500 mb-2">
                                    <i class="fas fa-arrow-left mr-2"></i>Previous Article
                                </p>
                                <h4 class="font-semibold group-hover:text-indigo-600 transition">{{ $previousPost->title }}</h4>
                            </a>
                        @endif
                        
                        @if($nextPost)
                            <a href="{{ route('blog.show', $nextPost->slug) }}" 
                               class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition group {{ !$previousPost ? 'md:col-start-2' : '' }}">
                                <p class="text-sm text-gray-500 mb-2">
                                    Next Article<i class="fas fa-arrow-right ml-2"></i>
                                </p>
                                <h4 class="font-semibold group-hover:text-indigo-600 transition">{{ $nextPost->title }}</h4>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    {{-- Related Posts --}}
    @if($relatedPosts && $relatedPosts->count() > 0)
        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12">Related Articles</h2>
                    
                    <div class="grid md:grid-cols-3 gap-8">
                        @foreach($relatedPosts as $related)
                            <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if($related->featured_image)
                                    <div class="relative h-48">
                                        <img src="{{ $related->featured_image }}" 
                                             alt="{{ $related->title }}" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute top-4 left-4">
                                            <span class="bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-medium">
                                                {{ $related->category }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="p-6">
                                    <div class="text-sm text-gray-500 mb-3">
                                        {{ $related->formatted_date }} • {{ $related->reading_time }} min read
                                    </div>
                                    
                                    <h3 class="text-xl font-semibold mb-3 hover:text-indigo-600 transition">
                                        <a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-4">{{ $related->excerpt }}</p>
                                    
                                    <a href="{{ route('blog.show', $related->slug) }}" 
                                       class="text-indigo-600 font-medium hover:text-indigo-700">
                                        Read More <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </article>
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
                Let's discuss how we can help transform your business with our technology solutions
            </p>
            <a href="{{ route('contact') }}" 
               class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                Get Started Today <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(function() {
            // Show a temporary success message
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
            button.classList.remove('bg-gray-600', 'hover:bg-gray-700');
            button.classList.add('bg-green-600');
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-gray-600', 'hover:bg-gray-700');
            }, 2000);
        });
    }
</script>
@endpush