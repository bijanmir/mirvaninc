<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    RateLimiter::for('contact', function (Request $request) {
        return Limit::perMinute(3)->by($request->ip())
            ->response(function () {
                return response()->json([
                    'message' => 'Too many contact attempts. Please try again later.'
                ], 429);
            });
    });
}
}
