@extends('layouts.admin')

@section('title', 'Create Blog Post')
@section('page-title', 'Create Blog Post')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.blog.index') }}" class="text-indigo-600 hover:text-indigo-900">
            <i class="fas fa-arrow-left mr-2"></i>Back to Posts
        </a>
    </div>
    
    <form action="{{ route('admin.blog.store') }}" method="POST" class="max-w-4xl">
        @csrf
        
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Post Details</h2>
            
            {{-- Title --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Slug --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Slug (leave empty to auto-generate)</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Excerpt --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
                <textarea name="excerpt" rows="3" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Content --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Content *</label>
                <div id="editor" style="height: 400px;"></div>
                <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Featured Image --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Featured Image URL</label>
                <input type="text" name="featured_image" value="{{ old('featured_image') }}"
                       placeholder="https://example.com/image.jpg"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('featured_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Categorization</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Category --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                    <select name="category" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select a category</option>
                        <option value="Web Development" {{ old('category') === 'Web Development' ? 'selected' : '' }}>Web Development</option>
                        <option value="Mobile Development" {{ old('category') === 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                        <option value="Digital Marketing" {{ old('category') === 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                        <option value="Design" {{ old('category') === 'Design' ? 'selected' : '' }}>Design</option>
                        <option value="Technology" {{ old('category') === 'Technology' ? 'selected' : '' }}>Technology</option>
                        <option value="Business" {{ old('category') === 'Business' ? 'selected' : '' }}>Business</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Tags --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tags (comma separated)</label>
                    <input type="text" name="tags_input" value="{{ old('tags') ? implode(', ', old('tags')) : '' }}"
                           placeholder="React, JavaScript, Web Development"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('tags')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Author & SEO</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Author Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Author Name *</label>
                    <input type="text" name="author_name" value="{{ old('author_name', auth()->user()->name) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('author_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Author Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Author Email</label>
                    <input type="email" name="author_email" value="{{ old('author_email', auth()->user()->email) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('author_email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Meta Title --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Meta Description --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="2"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Publishing</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                    <select name="status" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Published At --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Publish Date</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('published_at')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.blog.index') }}" 
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Create Post
                </button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });
    
    // Set initial content if exists
    var content = document.getElementById('content').value;
    if (content) {
        quill.root.innerHTML = content;
    }
    
    // Update hidden input on form submit
    document.querySelector('form').onsubmit = function() {
        var content = document.getElementById('content');
        content.value = quill.root.innerHTML;
        
        // Convert tags input to array
        var tagsInput = document.querySelector('input[name="tags_input"]');
        if (tagsInput.value) {
            var tags = tagsInput.value.split(',').map(tag => tag.trim()).filter(tag => tag);
            tags.forEach(tag => {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'tags[]';
                input.value = tag;
                this.appendChild(input);
            });
        }
    };
</script>
@endpush