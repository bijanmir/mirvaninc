<?php
// app/Http/Middleware/SecurityHeaders.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Security headers
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
        
        // Content Security Policy (adjust based on your needs)
        if (!app()->environment('local')) {
            $response->headers->set('Content-Security-Policy', 
                "default-src 'self'; " .
                "script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://unpkg.com https://js.stripe.com https://cdnjs.cloudflare.com; " .
                "style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com; " .
                "img-src 'self' data: https:; " .
                "font-src 'self' https://cdnjs.cloudflare.com; " .
                "connect-src 'self' https://api.stripe.com;"
            );
        }

        return $response;
    }
}

// Add this to bootstrap/app.php middleware
// ->withMiddleware(function (Middleware $middleware) {
//     $middleware->web(append: [
//         \App\Http\Middleware\SecurityHeaders::class,
//     ]);
// })