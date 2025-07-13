<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Check if user is admin (you can modify this logic)
        // For now, we'll check if email ends with @mirvaninc.com or is in admin list
        $adminEmails = [
            'admin@mirvaninc.com',
            'hello@mirvaninc.com',
            // Add more admin emails here
        ];

        $user = auth()->user();
        
        if (!in_array($user->email, $adminEmails) && !str_ends_with($user->email, '@mirvaninc.com')) {
            abort(403, 'Unauthorized access to admin panel.');
        }

        return $next($request);
    }
}