<?php
// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display the main services page
     */
    public function index()
    {
        return view('pages.services');
    }
    
    /**
     * Display the applications service page
     */
    public function applications()
    {
        $service = config('site.services.applications');
        return view('pages.service-detail', [
            'service' => $service,
            'key' => 'applications'
        ]);
    }
    
    /**
     * Display the websites service page
     */
    public function websites()
    {
        $service = config('site.services.websites');
        return view('pages.service-detail', [
            'service' => $service,
            'key' => 'websites'
        ]);
    }
    
    /**
     * Display the marketing service page
     */
    public function marketing()
    {
        $service = config('site.services.marketing');
        return view('pages.service-detail', [
            'service' => $service,
            'key' => 'marketing'
        ]);
    }
    
    /**
     * Display the transformation service page
     */
    public function transformation()
    {
        $service = config('site.services.transformation');
        return view('pages.service-detail', [
            'service' => $service,
            'key' => 'transformation'
        ]);
    }
}