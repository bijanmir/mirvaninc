<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get statistics for dashboard
        $stats = [
            'total_contacts' => Contact::count(),
            'new_contacts' => Contact::where('status', 'new')->count(),
            'total_blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::where('status', 'published')->count(),
            'total_projects' => PortfolioProject::count(),
            'featured_projects' => PortfolioProject::where('featured', true)->count(),
        ];

        // Get recent contacts
        $recentContacts = Contact::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get popular blog posts
        $popularPosts = BlogPost::orderBy('views', 'desc')
            ->limit(5)
            ->get();

        // Get contact stats by service
        $contactsByService = Contact::select('service', DB::raw('count(*) as total'))
            ->groupBy('service')
            ->get();

        // Get contact stats by budget
        $contactsByBudget = Contact::select('budget', DB::raw('count(*) as total'))
            ->groupBy('budget')
            ->orderByRaw("CASE 
                WHEN budget = '5k-10k' THEN 1
                WHEN budget = '10k-25k' THEN 2
                WHEN budget = '25k-50k' THEN 3
                WHEN budget = '50k-100k' THEN 4
                WHEN budget = '100k+' THEN 5
                ELSE 6
            END")
            ->get();

        // Get monthly contact trends (last 6 months)
        $monthlyContacts = Contact::selectRaw('
                DATE_FORMAT(created_at, "%Y-%m") as month,
                COUNT(*) as total
            ')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentContacts',
            'popularPosts',
            'contactsByService',
            'contactsByBudget',
            'monthlyContacts'
        ));
    }
}