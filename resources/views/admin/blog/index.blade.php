@extends('layouts.admin')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Posts')

@section('content')
    {{-- Header Actions --}}
    <div class="mb-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('admin.blog.index') }}" class="flex items-center">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search posts..."
                       class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <button type="submit" class="px-4 py-2 bg-gray-100 border border-l-0 border-gray-300 rounded-r-md hover:bg-gray-200">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            
            <select name="status" onchange="window.location.href='{{ route('admin.blog.index') }}?status=' + this.value" 
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="all">All Status</option>
                <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
        
        <a href="{{ route('admin.blog.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i>New Post
        </a>
    </div>
    
    {{-- Posts Table --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Post</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($posts as $post)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($post->excerpt, 50) }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900">{{ $post->category }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $post->author_name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($post->status === 'published') bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($post->views) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if($post->published_at)
                                {{ $post->published_at->format('M d, Y') }}
                            @else
                                <span class="text-gray-400">Not published</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                               class="text-gray-600 hover:text-gray-900 mr-3">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            <a href="{{ route('admin.blog.edit', $post) }}" 
                               class="text-indigo-600 hover:text-indigo-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this post?')"
                                        class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No blog posts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{-- Pagination --}}
        @if($posts->hasPages())
            <div class="px-6 py-3 border-t">
                {{ $posts->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection