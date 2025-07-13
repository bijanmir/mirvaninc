<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');

/*
|--------------------------------------------------------------------------
| Services Routes
|--------------------------------------------------------------------------
*/

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/applications', [ServiceController::class, 'applications'])->name('services.applications');
Route::get('/services/websites', [ServiceController::class, 'websites'])->name('services.websites');
Route::get('/services/marketing', [ServiceController::class, 'marketing'])->name('services.marketing');
Route::get('/services/transformation', [ServiceController::class, 'transformation'])->name('services.transformation');

/*
|--------------------------------------------------------------------------
| Portfolio Routes
|--------------------------------------------------------------------------
*/

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/category/{category}', [BlogController::class, 'category'])->name('category');
    Route::get('/tag/{tag}', [BlogController::class, 'tag'])->name('tag');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware(['throttle:contact'])
    ->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Payment Routes (Stripe Integration)
|--------------------------------------------------------------------------
*/

Route::prefix('payment')->name('payment.')->group(function () {
    Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('checkout');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
    Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
    Route::post('/webhook', [PaymentController::class, 'webhook'])
        ->name('webhook')
        ->withoutMiddleware(['web', 'VerifyCsrfToken']);
});

/*
|--------------------------------------------------------------------------
| Legal & Footer Pages
|--------------------------------------------------------------------------
*/

Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| API Routes for AJAX/HTMX (Optional)
|--------------------------------------------------------------------------
*/

Route::prefix('api')->name('api.')->group(function () {
    Route::post('/contact', [ContactController::class, 'apiSubmit'])
        ->middleware(['throttle:contact'])
        ->name('contact.submit');
    Route::get('/portfolio/load-more', [PortfolioController::class, 'loadMore'])->name('portfolio.load-more');
    Route::get('/blog/load-more', [BlogController::class, 'loadMore'])->name('blog.load-more');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes - Include admin routes file
|--------------------------------------------------------------------------
*/

require __DIR__.'/admin.php';

/*
|--------------------------------------------------------------------------
| Fallback Route (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('errors.404');
});