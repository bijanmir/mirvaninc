<?php
// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page
     */
    public function home()
    {
        return view('home');
    }
    
    /**
     * Display the about page
     */
    public function about()
    {
        // You could fetch additional data here if needed
        $stats = [
            'team_size' => 50,
            'years_in_business' => date('Y') - 2014,
            'coffee_consumed' => '50,000+',
            'happy_clients' => '100+'
        ];
        
        return view('pages.about', compact('stats'));
    }
    
    /**
     * Display the pricing page
     */
    public function pricing()
    {
        return view('pages.pricing');
    }
    
    /**
     * Display the careers page
     */
    public function careers()
    {
        $openings = [
            [
                'title' => 'Senior Full Stack Developer',
                'location' => 'La Jolla, CA (Remote OK)',
                'type' => 'Full-time',
                'department' => 'Engineering',
                'description' => 'We\'re looking for an experienced full stack developer to join our growing team.'
            ],
            [
                'title' => 'UI/UX Designer',
                'location' => 'La Jolla, CA (Hybrid)',
                'type' => 'Full-time',
                'department' => 'Design',
                'description' => 'Help us create beautiful, user-centered designs for our clients.'
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'location' => 'Remote',
                'type' => 'Full-time',
                'department' => 'Marketing',
                'description' => 'Drive results for our clients through data-driven marketing campaigns.'
            ]
        ];
        
        return view('pages.careers', compact('openings'));
    }
    
    /**
     * Display the privacy policy
     */
    public function privacy()
    {
        return view('legal.privacy');
    }
    
    /**
     * Display the terms of service
     */
    public function terms()
    {
        return view('legal.terms');
    }
    
    /**
     * Generate XML sitemap
     */
    public function sitemap()
    {
        $urls = [
            ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('services'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('portfolio'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('blog.index'), 'priority' => '0.7', 'changefreq' => 'daily'],
            ['loc' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('pricing'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ];
        
        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}