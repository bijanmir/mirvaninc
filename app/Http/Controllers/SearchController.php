<?php
// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('home');
        }

        // Search blog posts
        $blogPosts = BlogPost::published()
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->limit(5)
            ->get();

        // Search portfolio projects
        $portfolioProjects = PortfolioProject::published()
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->limit(5)
            ->get();

        $totalResults = $blogPosts->count() + $portfolioProjects->count();

        return view('search.results', compact('query', 'blogPosts', 'portfolioProjects', 'totalResults'));
    }

    public function suggest(Request $request)
    {
        $query = $request->get('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = collect();

        // Get blog post suggestions
        $blogSuggestions = BlogPost::published()
            ->where('title', 'like', "%{$query}%")
            ->select('title', 'slug')
            ->limit(3)
            ->get()
            ->map(function($post) {
                return [
                    'title' => $post->title,
                    'url' => route('blog.show', $post->slug),
                    'type' => 'Blog Post'
                ];
            });

        // Get portfolio suggestions
        $portfolioSuggestions = PortfolioProject::published()
            ->where('title', 'like', "%{$query}%")
            ->select('title', 'slug')
            ->limit(3)
            ->get()
            ->map(function($project) {
                return [
                    'title' => $project->title,
                    'url' => route('portfolio.show', $project->slug),
                    'type' => 'Portfolio'
                ];
            });

        $suggestions = $suggestions->concat($blogSuggestions)->concat($portfolioSuggestions);

        return response()->json($suggestions->take(6));
    }
}

// Add routes to web.php:
// Route::get('/search', [SearchController::class, 'index'])->name('search');
// Route::get('/api/search/suggest', [SearchController::class, 'suggest'])->name('search.suggest');