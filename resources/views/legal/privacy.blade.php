{{-- resources/views/legal/privacy.blade.php --}}
@extends('layouts.app')

@section('title', 'Privacy Policy - ' . config('site.name'))

@section('content')
<div class="pt-32 pb-20">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-8">Privacy Policy</h1>
            <p class="text-gray-600 mb-8">Last updated: {{ date('F j, Y') }}</p>
            
            <div class="prose prose-lg max-w-none">
                <h2>Information We Collect</h2>
                <p>We collect information you provide directly to us, such as when you create an account, contact us, or use our services.</p>
                
                <h2>How We Use Your Information</h2>
                <p>We use the information we collect to provide, maintain, and improve our services, process transactions, and communicate with you.</p>
                
                <h2>Information Sharing</h2>
                <p>We do not sell, trade, or otherwise transfer your personal information to outside parties except as described in this privacy policy.</p>
                
                <h2>Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us at {{ config('site.contact.email') }}.</p>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/legal/terms.blade.php --}}
@extends('layouts.app')

@section('title', 'Terms of Service - ' . config('site.name'))

@section('content')
<div class="pt-32 pb-20">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-8">Terms of Service</h1>
            <p class="text-gray-600 mb-8">Last updated: {{ date('F j, Y') }}</p>
            
            <div class="prose prose-lg max-w-none">
                <h2>Acceptance of Terms</h2>
                <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>
                
                <h2>Services</h2>
                <p>{{ config('site.name') }} provides technology consulting and development services as outlined on our website.</p>
                
                <h2>Payment Terms</h2>
                <p>Payment terms are specified in individual project agreements. All payments are processed securely through Stripe.</p>
                
                <h2>Limitation of Liability</h2>
                <p>In no event shall {{ config('site.name') }} be liable for any damages arising from the use of our services.</p>
                
                <h2>Contact Information</h2>
                <p>For questions regarding these terms, contact us at {{ config('site.contact.email') }}.</p>
            </div>
        </div>
    </div>
</div>
@endsection