{{-- resources/views/payment/cancel.blade.php --}}
@extends('layouts.app')

@section('title', 'Payment Cancelled - ' . config('site.name'))
@section('description', 'Your payment was cancelled. You can try again or contact us for assistance.')

@section('content')
    {{-- Cancel Section --}}
    <section class="min-h-screen flex items-center justify-center py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto text-center">
                {{-- Cancel Icon --}}
                <div class="mb-8">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-exclamation-triangle text-4xl text-yellow-600"></i>
                    </div>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Payment Cancelled
                </h1>
                
                <p class="text-xl text-gray-600 mb-8">
                    Your payment was not completed. Don't worry - no charges were made to your account.
                </p>
                
                {{-- Reasons Section --}}
                <div class="bg-gray-50 rounded-2xl p-8 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Common Reasons for Cancellation</h3>
                    <ul class="text-left space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-gray-400 mt-1 mr-3"></i>
                            <span>You decided to review the pricing options again</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-gray-400 mt-1 mr-3"></i>
                            <span>You need to discuss with your team before proceeding</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-gray-400 mt-1 mr-3"></i>
                            <span>You have questions about our services or pricing</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-gray-400 mt-1 mr-3"></i>
                            <span>Technical issues during the checkout process</span>
                        </li>
                    </ul>
                </div>
                
                {{-- Help Section --}}
                <div class="bg-indigo-50 rounded-2xl p-8 mb-8">
                    <h3 class="text-xl font-semibold mb-4">How Can We Help?</h3>
                    <p class="text-gray-600 mb-6">
                        Our team is standing by to answer any questions or concerns you might have about our services or pricing.
                    </p>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-white rounded-xl p-4">
                                <i class="fas fa-comments text-3xl text-indigo-600 mb-3"></i>
                                <h4 class="font-semibold mb-1">Live Chat</h4>
                                <p class="text-sm text-gray-600">Get instant answers</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white rounded-xl p-4">
                                <i class="fas fa-phone text-3xl text-indigo-600 mb-3"></i>
                                <h4 class="font-semibold mb-1">Call Us</h4>
                                <p class="text-sm text-gray-600">{{ config('site.contact.phone') }}</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white rounded-xl p-4">
                                <i class="fas fa-envelope text-3xl text-indigo-600 mb-3"></i>
                                <h4 class="font-semibold mb-1">Email</h4>
                                <p class="text-sm text-gray-600">{{ config('site.contact.email') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Special Offer --}}
                <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-8">
                    <div class="flex items-center justify-center mb-3">
                        <i class="fas fa-gift text-2xl text-green-600 mr-3"></i>
                        <h4 class="text-lg font-semibold">Special Offer for You</h4>
                    </div>
                    <p class="text-gray-600 mb-4">
                        As a thank you for considering our services, we'd like to offer you a free 30-minute consultation to discuss your project needs.
                    </p>
                    <a href="{{ route('contact') }}" class="text-green-600 font-semibold hover:text-green-700">
                        Claim Your Free Consultation <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('pricing') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Pricing
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-indigo-600 hover:text-white transition">
                        <i class="fas fa-question-circle mr-2"></i> Contact Support
                    </a>
                </div>
                
                {{-- Trust Badge --}}
                <div class="mt-12">
                    <p class="text-sm text-gray-500 mb-4">Your security is our priority</p>
                    <div class="flex items-center justify-center space-x-6">
                        <i class="fab fa-stripe text-4xl text-gray-400"></i>
                        <i class="fas fa-lock text-2xl text-gray-400"></i>
                        <i class="fas fa-shield-alt text-2xl text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- FAQ Mini Section --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                <h3 class="text-2xl font-semibold text-center mb-8">Quick Questions</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl">
                        <h4 class="font-semibold mb-2">Was I charged?</h4>
                        <p class="text-gray-600 text-sm">No, cancelling the payment process means no charges were made to your card.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl">
                        <h4 class="font-semibold mb-2">Can I try again?</h4>
                        <p class="text-gray-600 text-sm">Absolutely! You can return to our pricing page anytime to complete your purchase.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl">
                        <h4 class="font-semibold mb-2">Need a custom quote?</h4>
                        <p class="text-gray-600 text-sm">We offer custom pricing for unique requirements. Contact our sales team to discuss.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl">
                        <h4 class="font-semibold mb-2">Payment issues?</h4>
                        <p class="text-gray-600 text-sm">If you experienced technical difficulties, our support team can help you complete your order.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Save the user's intent for remarketing (if you use analytics)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'payment_cancelled', {
            'event_category': 'ecommerce',
            'event_label': 'checkout_abandoned'
        });
    }
</script>
@endpush