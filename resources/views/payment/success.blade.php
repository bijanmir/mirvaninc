{{-- resources/views/payment/success.blade.php --}}
@extends('layouts.app')

@section('title', 'Payment Successful - ' . config('site.name'))
@section('description', 'Thank you for your payment. Your project is confirmed.')

@section('content')
    {{-- Success Section --}}
    <section class="min-h-screen flex items-center justify-center py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto text-center">
                {{-- Success Animation --}}
                <div class="mb-8">
                    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto animate-bounce">
                        <i class="fas fa-check text-4xl text-green-600"></i>
                    </div>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Payment Successful!
                </h1>
                
                <p class="text-xl text-gray-600 mb-8">
                    Thank you for choosing {{ config('site.name') }}. Your payment has been processed successfully.
                </p>
                
                {{-- Order Details (if available) --}}
                @if(isset($session))
                    <div class="bg-gray-50 rounded-2xl p-8 mb-8 text-left">
                        <h2 class="text-2xl font-semibold mb-4">Order Details</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-600">Order ID:</span>
                                <span class="font-medium">{{ substr($session->id, -8) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-600">Amount Paid:</span>
                                <span class="font-medium">${{ number_format($session->amount_total / 100, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-600">Payment Status:</span>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Completed</span>
                            </div>
                        </div>
                    </div>
                @endif
                
                {{-- What's Next Section --}}
                <div class="bg-indigo-50 rounded-2xl p-8 mb-8">
                    <h3 class="text-xl font-semibold mb-4">What Happens Next?</h3>
                    <div class="space-y-4 text-left">
                        <div class="flex items-start">
                            <div class="bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="text-sm font-bold">1</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Email Confirmation</h4>
                                <p class="text-gray-600 text-sm">You'll receive a detailed receipt and project overview within the next few minutes.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="text-sm font-bold">2</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Project Kickoff</h4>
                                <p class="text-gray-600 text-sm">Our project manager will contact you within 24 hours to schedule your kickoff meeting.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="text-sm font-bold">3</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Discovery Phase</h4>
                                <p class="text-gray-600 text-sm">We'll begin gathering requirements and planning your project timeline.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Contact Information --}}
                <div class="bg-white border border-gray-200 rounded-xl p-6 mb-8">
                    <p class="text-gray-600 mb-4">
                        If you have any questions, our team is here to help:
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:{{ config('site.contact.email') }}" class="flex items-center justify-center text-indigo-600 hover:text-indigo-700">
                            <i class="fas fa-envelope mr-2"></i>
                            {{ config('site.contact.email') }}
                        </a>
                        <a href="tel:{{ config('site.contact.phone_link') }}" class="flex items-center justify-center text-indigo-600 hover:text-indigo-700">
                            <i class="fas fa-phone mr-2"></i>
                            {{ config('site.contact.phone') }}
                        </a>
                    </div>
                </div>
                
                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700 transition">
                        Return to Home
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-indigo-600 hover:text-white transition">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Confetti Animation (Optional Fun Element) --}}
    <div class="fixed inset-0 pointer-events-none z-50" id="confetti-container"></div>
@endsection

@push('scripts')
<script>
    // Simple confetti effect on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Create confetti elements
        const colors = ['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'];
        const confettiContainer = document.getElementById('confetti-container');
        
        for (let i = 0; i < 100; i++) {
            const confetti = document.createElement('div');
            confetti.style.position = 'absolute';
            confetti.style.width = '10px';
            confetti.style.height = '10px';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.left = Math.random() * 100 + '%';
            confetti.style.top = '-10px';
            confetti.style.opacity = Math.random();
            confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
            confetti.style.transition = 'all 3s ease-out';
            confettiContainer.appendChild(confetti);
            
            // Animate confetti falling
            setTimeout(() => {
                confetti.style.top = '100%';
                confetti.style.transform = 'rotate(' + Math.random() * 720 + 'deg)';
                confetti.style.opacity = '0';
            }, 100);
            
            // Remove confetti after animation
            setTimeout(() => {
                confetti.remove();
            }, 3100);
        }
    });
</script>
@endpush