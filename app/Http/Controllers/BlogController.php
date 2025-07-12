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
        
        return view('blog.index', compact('posts', 'categories', 'currentCategory'));
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
        
        $categories = BlogPost::getCategories();
        $allTags = BlogPost::getAllTags();
        $currentTag = $tag;
        
        return view('blog.index', compact('posts', 'categories', 'allTags', 'currentTag'));
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
}