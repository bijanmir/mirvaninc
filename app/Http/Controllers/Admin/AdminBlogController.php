<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogPost::getCategories()->toArray();
        $allTags = BlogPost::getAllTags()->toArray();
        
        return view('admin.blog.create', compact('categories', 'allTags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'author_name' => 'required|string|max:255',
            'author_email' => 'nullable|email',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if (!isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($validated['status'] === 'published' && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogPost::getCategories()->toArray();
        $allTags = BlogPost::getAllTags()->toArray();
        
        return view('admin.blog.edit', compact('post', 'categories', 'allTags'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'author_name' => 'required|string|max:255',
            'author_email' => 'nullable|email',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if ($validated['status'] === 'published' && !$post->published_at && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.blog.edit', $post)
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();
        
        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}