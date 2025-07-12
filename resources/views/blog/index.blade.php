{{-- resources/views/blog/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Blog - ' . config('site.name'))
@section('description', 'Stay updated with the latest insights on web development, digital marketing, and technology trends from the ' . config('site.name') . ' team.')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-purple-600 to-indigo-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                @if(isset($currentCategory))
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">{{ ucfirst($currentCategory) }} Articles</h1>
                    <p class="text-xl md:text-2xl text-purple-100">
                        Insights and articles about {{ strtolower($currentCategory) }}
                    </p>
                @elseif(isset($currentTag))
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">Articles tagged: {{ $currentTag }}</h1>
                    <p class="text-xl md:text-2xl text-purple-100">
                        All articles related to {{ $currentTag }}
                    </p>
                @else
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Blog</h1>
                    <p class="text-xl md:text-2xl text-purple-100">
                        Insights, trends, and expert advice on technology, marketing, and business growth
                    </p>
                @endif
                
                {{-- Search Bar --}}
                <div class="mt-8 max-w-2xl mx-auto">
                    <form method="GET" action="{{ route('blog.index') }}" class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Search articles..." 
                               class="w-full px-6 py-4 pr-12 rounded-full text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                        <button type="submit" class="absolute right-2 top-2 p-2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-search text-xl"></i>
                        </button>
                    </form>
                </div>

                {{-- Back to all posts link for filtered views --}}
                @if(isset($currentCategory) || isset($currentTag))
                    <div class="mt-6">
                        <a href="{{ route('blog.index') }}" class="text-purple-200 hover:text-white transition">
                            <i class="fas fa-arrow-left mr-2"></i>Back to All Articles
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    
    {{-- Featured Post (only show on main blog page) --}}
    @if(isset($featuredPost) && $featuredPost && !request('search') && !isset($currentCategory) && !isset($currentTag))
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-2xl font-bold mb-8 text-center">Featured Article</h2>
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <img src="{{ $featuredPost->featured_image }}" 
                                 alt="{{ $featuredPost->title }}" 
                                 class="w-full h-64 md:h-full object-cover">
                        </div>
                        <div class="md:w-1/2 p-8">
                            <div class="flex items-center mb-4">
                                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $featuredPost->category }}
                                </span>
                                <span class="text-gray-500 ml-4">{{ $featuredPost->formatted_date }}</span>
                            </div>
                            <h3 class="text-3xl font-bold mb-4">{{ $featuredPost->title }}</h3>
                            <p class="text-gray-600 mb-6">{{ $featuredPost->excerpt }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-purple-600 font-semibold">{{ substr($featuredPost->author_name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">{{ $featuredPost->author_name }}</p>
                                        <p class="text-sm text-gray-500">{{ $featuredPost->reading_time }} min read</p>
                                    </div>
                                </div>
                                <a href="{{ route('blog.show', $featuredPost->slug) }}" 
                                   class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    {{-- Main Content --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap -mx-6">
                {{-- Main Content --}}
                <div class="w-full lg:w-2/3 px-6">
                    @if(request('search'))
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold mb-2">Search Results</h2>
                            <p class="text-gray-600">
                                Found {{ $posts->total() }} article{{ $posts->total() !== 1 ? 's' : '' }} 
                                for "{{ request('search') }}"
                            </p>
                        </div>
                    @elseif(isset($currentCategory))
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold mb-2">{{ ucfirst($currentCategory) }} Articles</h2>
                            <p class="text-gray-600">
                                {{ $posts->total() }} article{{ $posts->total() !== 1 ? 's' : '' }} 
                                in this category
                            </p>
                        </div>
                    @elseif(isset($currentTag))
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold mb-2">Articles tagged "{{ $currentTag }}"</h2>
                            <p class="text-gray-600">
                                {{ $posts->total() }} article{{ $posts->total() !== 1 ? 's' : '' }} 
                                with this tag
                            </p>
                        </div>
                    @endif
                    
                    {{-- Blog Posts Grid --}}
                    <div class="grid md:grid-cols-2 gap-8" id="posts-grid">
                        @forelse($posts as $post)
                            <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if($post->featured_image)
                                    <div class="relative">
                                        <img src="{{ $post->featured_image }}" 
                                             alt="{{ $post->title }}" 
                                             class="w-full h-48 object-cover">
                                        <div class="absolute top-4 left-4">
                                            <a href="{{ route('blog.category', $post->category) }}"
                                               class="bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-medium hover:bg-white transition">
                                                {{ $post->category }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="p-6">
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <span>{{ $post->formatted_date }}</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $post->reading_time }} min read</span>
                                        @if($post->views > 0)
                                            <span class="mx-2">•</span>
                                            <span>{{ number_format($post->views) }} views</span>
                                        @endif
                                    </div>
                                    
                                    <h3 class="text-xl font-semibold mb-3 hover:text-purple-600 transition">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-2">
                                                <span class="text-purple-600 text-sm font-semibold">
                                                    {{ substr($post->author_name, 0, 1) }}
                                                </span>
                                            </div>
                                            <span class="text-sm text-gray-600">{{ $post->author_name }}</span>
                                        </div>
                                        
                                        @if($post->tags && count($post->tags) > 0)
                                            <div class="flex gap-2">
                                                @foreach(array_slice($post->tags, 0, 2) as $tag)
                                                    <a href="{{ route('blog.tag', $tag) }}"
                                                       class="bg-gray-100 hover:bg-purple-100 hover:text-purple-600 text-gray-600 px-2 py-1 rounded text-xs transition">
                                                        {{ $tag }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="col-span-2 text-center py-12">
                                <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-2xl font-semibold text-gray-600 mb-2">No articles found</h3>
                                <p class="text-gray-500">
                                    @if(request('search'))
                                        Try adjusting your search terms or browse our categories.
                                    @elseif(isset($currentCategory))
                                        No articles in this category yet. Check back soon!
                                    @elseif(isset($currentTag))
                                        No articles with this tag yet. Check back soon!
                                    @else
                                        Check back soon for new content!
                                    @endif
                                </p>
                                @if(isset($currentCategory) || isset($currentTag) || request('search'))
                                    <a href="{{ route('blog.index') }}" 
                                       class="inline-block mt-4 bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition">
                                        View All Articles
                                    </a>
                                @endif
                            </div>
                        @endforelse
                    </div>
                    
                    {{-- Pagination --}}
                    @if($posts->hasPages())
                        <div class="mt-12">
                            {{ $posts->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
                
                {{-- Sidebar --}}
                <div class="w-full lg:w-1/3 px-6 mt-12 lg:mt-0">
                    {{-- Categories --}}
                    @if(isset($categories) && $categories->count() > 0)
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                            <h3 class="text-xl font-semibold mb-4">Categories</h3>
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                    <a href="{{ route('blog.category', $category) }}" 
                                       class="block py-2 px-3 rounded-lg hover:bg-purple-50 hover:text-purple-600 transition {{ isset($currentCategory) && $currentCategory === $category ? 'bg-purple-100 text-purple-600' : '' }}">
                                        {{ $category }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    {{-- Popular Tags --}}
                    @if(isset($popularTags) && $popularTags->count() > 0)
                        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                            <h3 class="text-xl font-semibold mb-4">Popular Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($popularTags as $tag)
                                    <a href="{{ route('blog.tag', $tag) }}" 
                                       class="bg-gray-100 hover:bg-purple-100 hover:text-purple-600 px-3 py-1 rounded-full text-sm transition {{ isset($currentTag) && $currentTag === $tag ? 'bg-purple-100 text-purple-600' : '' }}">
                                        {{ $tag }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    {{-- Newsletter Signup --}}
                    <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-2xl shadow-lg p-6 text-white">
                        <h3 class="text-xl font-semibold mb-3">Stay Updated</h3>
                        <p class="text-purple-100 mb-4">Get the latest insights delivered to your inbox.</p>
                        <form class="space-y-3">
                            <input type="email" 
                                   placeholder="Your email address" 
                                   class="w-full px-4 py-2 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                            <button type="submit" 
                                    class="w-full bg-white text-purple-600 py-2 rounded-lg font-semibold hover:bg-gray-100 transition">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Optional: Add infinite scroll or load more functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit search form on input with debounce
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            let timeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    if (this.value.length > 2 || this.value.length === 0) {
                        this.form.submit();
                    }
                }, 500);
            });
        }
    });
</script>
@endpush