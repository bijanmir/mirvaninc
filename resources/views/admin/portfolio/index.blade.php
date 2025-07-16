@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Portfolio Projects</h1>
            <p class="text-gray-600 mt-1">Manage your portfolio items and showcase your work</p>
        </div>
        
        <a href="{{ route('admin.portfolio.create') }}" 
           class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-plus mr-2"></i>Add New Project
        </a>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Projects</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-folder text-indigo-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Published</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['published'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Featured</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['featured'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-star text-yellow-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Categories</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['categories'] ?? 4 }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tags text-purple-600"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1">
                <form method="GET" action="{{ route('admin.portfolio.index') }}" class="flex gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search projects..." 
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <select name="category" 
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">All Categories</option>
                        <option value="web" {{ request('category') === 'web' ? 'selected' : '' }}>Web Development</option>
                        <option value="mobile" {{ request('category') === 'mobile' ? 'selected' : '' }}>Mobile Apps</option>
                        <option value="design" {{ request('category') === 'design' ? 'selected' : '' }}>Design</option>
                        <option value="marketing" {{ request('category') === 'marketing' ? 'selected' : '' }}>Marketing</option>
                    </select>
                    
                    <select name="status" 
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">All Status</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    
                    <button type="submit" 
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Portfolio Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $project)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
                <!-- Project Image -->
                <div class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if($project->primary_image)
                        <img src="{{ $project->primary_image }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-image text-4xl text-gray-400"></i>
                        </div>
                    @endif
                    
                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            {{ $project->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                    
                    <!-- Featured Badge -->
                    @if($project->featured)
                        <div class="absolute top-4 left-4">
                            <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                                <i class="fas fa-star mr-1"></i>Featured
                            </span>
                        </div>
                    @endif
                </div>
                
                <!-- Project Info -->
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-xs font-medium">
                            {{ ucfirst($project->category) }}
                        </span>
                        @if($project->client)
                            <span class="text-gray-500 text-sm">{{ $project->client }}</span>
                        @endif
                    </div>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
                    
                    <!-- Technologies -->
                    @if($project->technologies && count($project->technologies) > 0)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->technologies) > 3)
                                <span class="text-gray-500 text-xs">+{{ count($project->technologies) - 3 }} more</span>
                            @endif
                        </div>
                    @endif
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t">
                        <div class="flex gap-2">
                            <a href="{{ route('portfolio.show', $project->slug) }}" 
                               target="_blank"
                               class="text-gray-600 hover:text-indigo-600 transition"
                               title="View Live">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            <a href="{{ route('admin.portfolio.edit', $project) }}" 
                               class="text-indigo-600 hover:text-indigo-700 transition"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.portfolio.destroy', $project) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-700 transition"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <!-- Toggle Featured -->
                            <form action="{{ route('admin.portfolio.toggle-featured', $project) }}" 
                                  method="POST" 
                                  class="inline-block">
                                @csrf
                                <button type="submit" 
                                        class="text-yellow-600 hover:text-yellow-700 transition"
                                        title="{{ $project->featured ? 'Remove from featured' : 'Make featured' }}">
                                    <i class="fas fa-star {{ $project->featured ? '' : 'opacity-30' }}"></i>
                                </button>
                            </form>
                            
                            <!-- Quick Stats -->
                            @if($project->views)
                                <span class="text-gray-500 text-sm">
                                    <i class="fas fa-eye mr-1"></i>{{ number_format($project->views) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No projects found</h3>
                    <p class="text-gray-500 mb-6">Start building your portfolio by adding your first project.</p>
                    <a href="{{ route('admin.portfolio.create') }}" 
                       class="inline-flex items-center bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition">
                        <i class="fas fa-plus mr-2"></i>Add Your First Project
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($projects->hasPages())
        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Add any portfolio-specific JavaScript here
</script>
@endpush