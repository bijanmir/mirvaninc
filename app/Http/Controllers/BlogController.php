<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display blog index page
     */
    public function index(Request $request)
    {
        $query = BlogPost::published()->orderBy('published_at', 'desc');
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        
        $posts = $query->paginate(12);
        $featuredPost = BlogPost::published()
                               ->orderBy('published_at', 'desc')
                               ->first();
        
        // Get categories and tags for filter sidebar
        $categories = BlogPost::getCategories();
        $popularTags = BlogPost::getAllTags()->take(10);
        
        return view('blog.index', compact('posts', 'featuredPost', 'categories', 'popularTags'));
    }
    
    /**
     * Display posts by category
     */
    public function category(Request $request, $category)
    {
        $posts = BlogPost::published()
                        ->byCategory($category)
                        ->orderBy('published_at', 'desc')
                        ->paginate(12);
        
        $categories = BlogPost::getCategories();
        $currentCategory = $category;
        
        return view('blog.category', compact('posts', 'categories', 'currentCategory'));
    }
    
    /**
     * Display posts by tag
     */
    public function tag(Request $request, $tag)
    {
        $posts = BlogPost::published()
                        ->byTag($tag)
                        ->orderBy('published_at', 'desc')
                        ->paginate(12);
        
        $allTags = BlogPost::getAllTags();
        $currentTag = $tag;
        
        return view('blog.tag', compact('posts', 'allTags', 'currentTag'));
    }
    
    /**
     * Display single blog post
     */
    public function show(Request $request, $slug)
    {
        $post = BlogPost::where('slug', $slug)
                       ->where('status', 'published')
                       ->where('published_at', '<=', now())
                       ->firstOrFail();
        
        // Increment view count
        $post->increment('views');
        
        // Get related posts (same category, excluding current post)
        $relatedPosts = BlogPost::published()
                              ->where('id', '!=', $post->id)
                              ->when($post->category, function($query) use ($post) {
                                  return $query->byCategory($post->category);
                              })
                              ->orderBy('published_at', 'desc')
                              ->limit(3)
                              ->get();
        
        // Get next and previous posts
        $nextPost = BlogPost::published()
                           ->where('published_at', '>', $post->published_at)
                           ->orderBy('published_at', 'asc')
                           ->first();
        
        $previousPost = BlogPost::published()
                               ->where('published_at', '<', $post->published_at)
                               ->orderBy('published_at', 'desc')
                               ->first();
        
        return view('blog.show', compact('post', 'relatedPosts', 'nextPost', 'previousPost'));
    }
    
    /**
     * Load more posts via AJAX
     */
    public function loadMore(Request $request)
    {
        $page = $request->get('page', 2);
        $category = $request->get('category');
        $tag = $request->get('tag');
        
        $query = BlogPost::published()->orderBy('published_at', 'desc');
        
        if ($category) {
            $query->byCategory($category);
        }
        
        if ($tag) {
            $query->byTag($tag);
        }
        
        $posts = $query->paginate(12, ['*'], 'page', $page);
        
        return response()->json([
            'html' => view('blog.partials.post-grid', ['posts' => $posts])->render(),
            'hasMore' => $posts->hasMorePages(),
            'nextPage' => $posts->currentPage() + 1
        ]);
    }
    
    /**
     * Get recent posts for sidebar/widgets
     */
    public function getRecentPosts($limit = 5)
    {
        return BlogPost::published()
                      ->orderBy('published_at', 'desc')
                      ->limit($limit)
                      ->get(['title', 'slug', 'published_at', 'featured_image']);
    }
    
    /**
     * Get popular posts (most viewed)
     */
    public function getPopularPosts($limit = 5)
    {
        return BlogPost::published()
                      ->orderBy('views', 'desc')
                      ->limit($limit)
                      ->get(['title', 'slug', 'views', 'featured_image']);
    }
    
    /**
     * Admin methods for managing blog posts
     */
    public function adminIndex(Request $request)
    {
        $query = BlogPost::query();
        
        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        // Filter by category
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        
        $posts = $query->orderBy('created_at', 'desc')->paginate(20);
        $categories = BlogPost::getCategories();
        
        return view('admin.blog.index', compact('posts', 'categories'));
    }
    
    /**
     * Show admin create form
     */
    public function adminCreate()
    {
        $categories = BlogPost::getCategories();
        return view('admin.blog.create', compact('categories'));
    }
    
    /**
     * Store new blog post
     */
    public function adminStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'author_name' => 'required|string|max:255',
            'author_email' => 'nullable|email',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date'
        ]);
        
        if ($validated['status'] === 'published' && !$validated['published_at']) {
            $validated['published_at'] = now();
        }
        
        BlogPost::create($validated);
        
        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }
}