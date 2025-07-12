<?php
// app/Http/Controllers/PortfolioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio page
     */
    public function index()
    {
        // In a real application, you would fetch projects from database
        $projects = [
            [
                'title' => 'Enterprise Analytics Platform',
                'category' => 'applications',
                'client' => 'Fortune 500 Client',
                'description' => 'Built a comprehensive analytics platform serving 10,000+ users with real-time data processing.',
                'tags' => ['SaaS', 'React', 'AWS'],
                'metrics' => 'For: Fortune 500 Client',
                'color' => 'from-indigo-500 to-purple-600',
                'icon' => 'fa-chart-bar'
            ],
            [
                'title' => 'Luxury Fashion E-commerce',
                'category' => 'websites',
                'client' => 'Fashion Brand',
                'description' => 'Designed and developed a high-end fashion e-commerce site with 300% increase in conversion rate.',
                'tags' => ['E-commerce', 'Shopify Plus'],
                'metrics' => 'Revenue: $2M+ annually',
                'color' => 'from-purple-500 to-pink-600',
                'icon' => 'fa-shopping-cart'
            ],
            // Add more projects as needed
        ];
        
        return view('pages.portfolio', compact('projects'));
    }
    
    /**
     * Display a single portfolio item
     */
    public function show($slug)
    {
        // In a real application, fetch from database based on slug
        $project = [
            'title' => 'Enterprise Analytics Platform',
            'client' => 'Fortune 500 Financial Services Company',
            'duration' => '8 months',
            'team_size' => '12 developers',
            'technologies' => ['React', 'Node.js', 'AWS', 'PostgreSQL', 'Redis'],
            'challenge' => 'The client needed a unified analytics platform to replace multiple legacy systems...',
            'solution' => 'We built a cloud-native solution using microservices architecture...',
            'results' => [
                '10,000+ daily active users',
                '99.9% uptime',
                '60% reduction in report generation time',
                '$2M annual cost savings'
            ],
            'testimonial' => [
                'content' => 'Mirvan Inc delivered an exceptional platform that transformed our analytics capabilities.',
                'author' => 'John Smith',
                'position' => 'CTO',
                'company' => 'Fortune 500 Client'
            ]
        ];
        
        return view('pages.portfolio-detail', compact('project'));
    }
    
    /**
     * Load more projects via AJAX
     */
    public function loadMore(Request $request)
    {
        $page = $request->get('page', 2);
        $category = $request->get('category', 'all');
        
        // In real app, paginate from database
        $moreProjects = [
            // Additional projects array
        ];
        
        return response()->json([
            'html' => view('partials.portfolio-items', ['projects' => $moreProjects])->render(),
            'hasMore' => false // Set based on actual pagination
        ]);
    }
}