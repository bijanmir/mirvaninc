<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = PortfolioProject::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $projects = $query->ordered()->paginate(20);

        return view('admin.portfolio.index', compact('projects'));
    }

    public function create()
    {
        $categories = ['applications', 'websites', 'marketing', 'transformation'];
        $technologies = PortfolioProject::getAllTechnologies()->toArray();
        
        return view('admin.portfolio.create', compact('categories', 'technologies'));
    }

    public function store(Request $request)
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
            'gallery_images.*' => 'string',
            'category' => 'required|in:applications,websites,marketing,transformation',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:50',
            'duration' => 'nullable|string|max:100',
            'team_size' => 'nullable|integer|min:1|max:100',
            'budget_range' => 'nullable|string',
            'results' => 'nullable|array',
            'results.*' => 'string',
            'testimonial' => 'nullable|array',
            'testimonial.content' => 'nullable|string',
            'testimonial.author' => 'nullable|string',
            'testimonial.position' => 'nullable|string',
            'testimonial.company' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'completed_at' => 'nullable|date',
            'sort_order' => 'nullable|integer'
        ]);

        if (!isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if (!isset($validated['sort_order'])) {
            $validated['sort_order'] = PortfolioProject::max('sort_order') + 1;
        }

        PortfolioProject::create($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project created successfully.');
    }

    public function edit(PortfolioProject $project)
    {
        $categories = ['applications', 'websites', 'marketing', 'transformation'];
        $technologies = PortfolioProject::getAllTechnologies()->toArray();
        
        return view('admin.portfolio.edit', compact('project', 'categories', 'technologies'));
    }

    public function update(Request $request, PortfolioProject $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_projects,slug,' . $project->id,
            'description' => 'required|string|max:1000',
            'content' => 'nullable|string',
            'client_name' => 'required|string|max:255',
            'client_industry' => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'featured_image' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'string',
            'category' => 'required|in:applications,websites,marketing,transformation',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:50',
            'duration' => 'nullable|string|max:100',
            'team_size' => 'nullable|integer|min:1|max:100',
            'budget_range' => 'nullable|string',
            'results' => 'nullable|array',
            'results.*' => 'string',
            'testimonial' => 'nullable|array',
            'testimonial.content' => 'nullable|string',
            'testimonial.author' => 'nullable|string',
            'testimonial.position' => 'nullable|string',
            'testimonial.company' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean',
            'completed_at' => 'nullable|date',
            'sort_order' => 'nullable|integer'
        ]);

        $project->update($validated);

        return redirect()->route('admin.portfolio.edit', $project)
            ->with('success', 'Portfolio project updated successfully.');
    }

    public function destroy(PortfolioProject $project)
    {
        $project->delete();
        
        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project deleted successfully.');
    }

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