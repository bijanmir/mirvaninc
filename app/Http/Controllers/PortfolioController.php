<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio page
     */
    public function index(Request $request)
    {
        $query = PortfolioProject::published()->ordered();
        
        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        // Filter by technology if provided
        if ($request->has('technology')) {
            $query->byTechnology($request->technology);
        }
        
        $projects = $query->paginate(12);
        
        // Get featured projects for hero section
        $featuredProjects = PortfolioProject::published()
                                          ->featured()
                                          ->ordered()
                                          ->limit(3)
                                          ->get();
        
        // Get filter options
        $categories = PortfolioProject::getCategories();
        $technologies = PortfolioProject::getAllTechnologies();
        
        // Get stats for the stats section
        $stats = [
            'total_projects' => PortfolioProject::published()->count(),
            'happy_clients' => PortfolioProject::published()->distinct('client_name')->count(),
            'categories' => $categories->count(),
            'technologies' => $technologies->count()
        ];
        
        return view('pages.portfolio', compact(
            'projects', 
            'featuredProjects', 
            'categories', 
            'technologies', 
            'stats'
        ));
    }
    
    /**
     * Display a single portfolio item
     */
    public function show($slug)
    {
        $project = PortfolioProject::where('slug', $slug)
                                 ->where('status', 'published')
                                 ->firstOrFail();
        
        // Get related projects (same category, excluding current)
        $relatedProjects = PortfolioProject::published()
                                         ->where('id', '!=', $project->id)
                                         ->byCategory($project->category)
                                         ->ordered()
                                         ->limit(3)
                                         ->get();
        
        // Get next and previous projects
        $nextProject = PortfolioProject::published()
                                     ->where('sort_order', '>', $project->sort_order)
                                     ->orWhere(function($query) use ($project) {
                                         $query->where('sort_order', $project->sort_order)
                                               ->where('id', '>', $project->id);
                                     })
                                     ->ordered()
                                     ->first();
        
        $previousProject = PortfolioProject::published()
                                         ->where('sort_order', '<', $project->sort_order)
                                         ->orWhere(function($query) use ($project) {
                                             $query->where('sort_order', $project->sort_order)
                                                   ->where('id', '<', $project->id);
                                         })
                                         ->orderBy('sort_order', 'desc')
                                         ->orderBy('id', 'desc')
                                         ->first();
        
        return view('pages.portfolio-detail', compact(
            'project', 
            'relatedProjects', 
            'nextProject', 
            'previousProject'
        ));
    }
    
    /**
     * Load more projects via AJAX
     */
    public function loadMore(Request $request)
    {
        $page = $request->get('page', 2);
        $category = $request->get('category');
        $technology = $request->get('technology');
        
        $query = PortfolioProject::published()->ordered();
        
        if ($category && $category !== 'all') {
            $query->byCategory($category);
        }
        
        if ($technology) {
            $query->byTechnology($technology);
        }
        
        $projects = $query->paginate(12, ['*'], 'page', $page);
        
        return response()->json([
            'html' => view('portfolio.partials.project-grid', ['projects' => $projects])->render(),
            'hasMore' => $projects->hasMorePages(),
            'nextPage' => $projects->currentPage() + 1
        ]);
    }
    
    /**
     * Get featured projects for home page
     */
    public function getFeaturedProjects($limit = 6)
    {
        return PortfolioProject::published()
                              ->featured()
                              ->ordered()
                              ->limit($limit)
                              ->get();
    }
    
    /**
     * Admin methods for managing portfolio
     */
    public function adminIndex(Request $request)
    {
        $query = PortfolioProject::query();
        
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
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        $projects = $query->ordered()->paginate(20);
        $categories = PortfolioProject::getCategories();
        
        return view('admin.portfolio.index', compact('projects', 'categories'));
    }
    
    /**
     * Show admin create form
     */
    public function adminCreate()
    {
        $categories = ['applications', 'websites', 'marketing', 'transformation'];
        $technologies = PortfolioProject::getAllTechnologies();
        
        return view('admin.portfolio.create', compact('categories', 'technologies'));
    }
    
    /**
     * Store new portfolio project
     */
    public function adminStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_projects,slug',
            'description' => 'required|string|max:1000',
            'content' => 'nullable|string',
            'client_name' => 'required|string|max:255',
            'client_industry' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'featured_image' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'category' => 'required|in:applications,websites,marketing,transformation',
            'tags' => 'nullable|array',
            'technologies' => 'nullable|array',
            'duration' => 'nullable|string|max:100',
            'team_size' => 'nullable|integer|min:1|max:100',
            'budget_range' => 'nullable|string',
            'results' => 'nullable|array',
            'testimonial' => 'nullable|array',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'completed_at' => 'nullable|date',
            'sort_order' => 'nullable|integer'
        ]);
        
        // Set default sort order if not provided
        if (!isset($validated['sort_order'])) {
            $validated['sort_order'] = PortfolioProject::max('sort_order') + 1;
        }
        
        PortfolioProject::create($validated);
        
        return redirect()->route('admin.portfolio.index')
                        ->with('success', 'Portfolio project created successfully.');
    }
    
    /**
     * Update project sort order (for drag-and-drop reordering)
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'projects' => 'required|array',
            'projects.*.id' => 'required|exists:portfolio_projects,id',
            'projects.*.sort_order' => 'required|integer'
        ]);
        
        foreach ($validated['projects'] as $projectData) {
            PortfolioProject::where('id', $projectData['id'])
                           ->update(['sort_order' => $projectData['sort_order']]);
        }
        
        return response()->json(['success' => true]);
    }
}