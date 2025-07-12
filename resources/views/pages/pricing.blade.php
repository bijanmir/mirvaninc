{{-- resources/views/pages/pricing.blade.php --}}
@extends('layouts.app')

@section('title', 'Pricing - ' . config('site.name'))
@section('description', 'Transparent pricing for our technology services. Choose from our starter, professional, or enterprise packages. Custom solutions available.')

@push('head')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('pricing', {
                annual: false
            })
        })
    </script>
    <style>
        .pricing-card {
            transition: all 0.3s ease;
        }
        .pricing-card.popular {
            transform: scale(1.05);
        }
        .pricing-toggle input:checked ~ .toggle-slider {
            transform: translateX(100%);
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Simple, Transparent Pricing</h1>
                <p class="text-xl md:text-2xl text-indigo-100">
                    Choose the perfect plan for your business needs. All plans include our award-winning support.
                </p>
            </div>
        </div>
    </section>
    
    {{-- Main Pricing Section with Alpine.js --}}
    <div>
        {{-- Pricing Toggle (Monthly/Annual) --}}
        <section class="py-12">
            <div class="container mx-auto px-6">
                <div id="billingToggle" class="flex items-center justify-center">
                    <span class="text-gray-700 font-medium mr-4">Monthly</span>
                    <label class="relative inline-block w-16 h-8">
                        <input type="checkbox" x-model="$store.pricing.annual" class="sr-only">
                        <div class="w-16 h-8 bg-gray-300 rounded-full relative">
                            <div class="toggle-slider absolute left-0 top-1 w-6 h-6 bg-white rounded-full shadow-md transition-transform duration-300"></div>
                        </div>
                    </label>
                    <span class="text-gray-700 font-medium ml-4">Annual</span>
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium ml-4">Save 20%</span>
                </div>
            </div>
        </section>
        
        {{-- Pricing Cards --}}
        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    {{-- Starter Plan --}}
                    <div class="pricing-card bg-white rounded-2xl shadow-xl p-8">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold mb-2">Starter</h3>
                            <p class="text-gray-600 mb-4">Perfect for small businesses</p>
                            <div class="mb-4">
                                <span class="text-5xl font-bold text-gray-900">
                                    <span x-text="$store.pricing.annual ? '$20,000' : '$2,500'">$2,500</span>
                                </span>
                                <span class="text-gray-600" x-text="$store.pricing.annual ? '/year' : '/month'">/month</span>
                            </div>
                            <p class="text-sm text-gray-500" x-show="$store.pricing.annual">Billed annually (save $10,000)</p>
                            <p class="text-sm text-gray-500" x-show="!$store.pricing.annual">Billed monthly</p>
                        </div>
                        
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>5-7 page website</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Responsive design</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Basic SEO setup</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Contact form integration</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>3 months support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Basic analytics</span>
                            </li>
                        </ul>
                        
                        <button onclick="selectPlan('starter')" 
                                class="w-full bg-gray-100 text-gray-700 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                            Get Started
                        </button>
                    </div>
                    
                    {{-- Professional Plan (Popular) --}}
                    <div class="pricing-card popular bg-white rounded-2xl shadow-2xl p-8 relative">
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <span class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-1 rounded-full text-sm font-medium">
                                MOST POPULAR
                            </span>
                        </div>
                        
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold mb-2">Professional</h3>
                            <p class="text-gray-600 mb-4">For growing businesses</p>
                            <div class="mb-4">
                                <span class="text-5xl font-bold text-indigo-600">
                                    <span x-text="$store.pricing.annual ? '$40,000' : '$5,000'">$5,000</span>
                                </span>
                                <span class="text-gray-600" x-text="$store.pricing.annual ? '/year' : '/month'">/month</span>
                            </div>
                            <p class="text-sm text-gray-500" x-show="$store.pricing.annual">Billed annually (save $20,000)</p>
                            <p class="text-sm text-gray-500" x-show="!$store.pricing.annual">Billed monthly</p>
                        </div>
                        
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>10-15 custom pages</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Content Management System</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Advanced SEO & Analytics</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>E-commerce ready</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>6 months support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Social media integration</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Email marketing setup</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Performance optimization</span>
                            </li>
                        </ul>
                        
                        <button onclick="selectPlan('professional')"
                                class="w-full bg-indigo-600 text-white py-3 rounded-full font-semibold hover:bg-indigo-700 transition">
                            Get Started
                        </button>
                    </div>
                    
                    {{-- Enterprise Plan --}}
                    <div class="pricing-card bg-white rounded-2xl shadow-xl p-8">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                            <p class="text-gray-600 mb-4">For large organizations</p>
                            <div class="mb-4">
                                <span class="text-5xl font-bold text-gray-900">Custom</span>
                            </div>
                            <p class="text-sm text-gray-500">Tailored to your needs</p>
                        </div>
                        
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Unlimited pages</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Custom functionality</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Multi-language support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Advanced integrations</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>12 months support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Dedicated account manager</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Priority support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span>Custom SLA</span>
                            </li>
                        </ul>
                        
                        <a href="{{ route('contact') }}" 
                           class="block w-full text-center bg-gray-100 text-gray-700 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                            Contact Sales
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    {{-- Service Add-ons --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Service Add-ons</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Enhance your package with additional services
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-rocket text-3xl text-indigo-600 mr-4"></i>
                        <div>
                            <h4 class="font-semibold">Speed Optimization</h4>
                            <p class="text-indigo-600 font-bold">+$500</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">Advanced performance tuning for lightning-fast load times</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-shield-alt text-3xl text-green-600 mr-4"></i>
                        <div>
                            <h4 class="font-semibold">Advanced Security</h4>
                            <p class="text-green-600 font-bold">+$750</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">SSL certificate, firewall, and security monitoring</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-language text-3xl text-purple-600 mr-4"></i>
                        <div>
                            <h4 class="font-semibold">Multi-language</h4>
                            <p class="text-purple-600 font-bold">+$1,000/language</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">Full translation and localization for global reach</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Feature Comparison Table --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Compare Plans</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    All plans include our core features. See what's different.
                </p>
            </div>
            
            <div class="max-w-6xl mx-auto overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-4 px-4">Features</th>
                            <th class="text-center py-4 px-4">Starter</th>
                            <th class="text-center py-4 px-4">
                                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">Professional</span>
                            </th>
                            <th class="text-center py-4 px-4">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-4 px-4 font-medium">Pages Included</td>
                            <td class="text-center py-4 px-4">5-7</td>
                            <td class="text-center py-4 px-4">10-15</td>
                            <td class="text-center py-4 px-4">Unlimited</td>
                        </tr>
                        <tr class="border-b bg-gray-50">
                            <td class="py-4 px-4 font-medium">Custom Design</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-4 font-medium">Mobile Responsive</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b bg-gray-50">
                            <td class="py-4 px-4 font-medium">CMS Integration</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-4 font-medium">E-commerce</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b bg-gray-50">
                            <td class="py-4 px-4 font-medium">Support Duration</td>
                            <td class="text-center py-4 px-4">3 months</td>
                            <td class="text-center py-4 px-4">6 months</td>
                            <td class="text-center py-4 px-4">12 months</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-4 font-medium">Dedicated Manager</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
    {{-- FAQ Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>
                
                <div x-data="{ activeAccordion: null }" class="space-y-4">
                    <div class="bg-white rounded-lg shadow">
                        <button @click="activeAccordion = activeAccordion === 1 ? null : 1"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">What's included in the support?</span>
                            <i class="fas fa-chevron-down transition-transform" :class="{'rotate-180': activeAccordion === 1}"></i>
                        </button>
                        <div x-show="activeAccordion === 1" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">Our support includes bug fixes, minor updates, technical assistance, and monthly performance reports. For major feature additions, we offer separate maintenance packages.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow">
                        <button @click="activeAccordion = activeAccordion === 2 ? null : 2"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">Can I upgrade my plan later?</span>
                            <i class="fas fa-chevron-down transition-transform" :class="{'rotate-180': activeAccordion === 2}"></i>
                        </button>
                        <div x-show="activeAccordion === 2" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">Absolutely! You can upgrade your plan at any time. We'll credit any unused portion of your current plan toward the upgrade.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow">
                        <button @click="activeAccordion = activeAccordion === 3 ? null : 3"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">What payment methods do you accept?</span>
                            <i class="fas fa-chevron-down transition-transform" :class="{'rotate-180': activeAccordion === 3}"></i>
                        </button>
                        <div x-show="activeAccordion === 3" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">We accept all major credit cards through Stripe, as well as ACH transfers and wire transfers for enterprise clients. Payment plans are available for larger projects.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow">
                        <button @click="activeAccordion = activeAccordion === 4 ? null : 4"
                                class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-semibold">Do you offer refunds?</span>
                            <i class="fas fa-chevron-down transition-transform" :class="{'rotate-180': activeAccordion === 4}"></i>
                        </button>
                        <div x-show="activeAccordion === 4" x-cloak x-transition class="px-6 pb-4">
                            <p class="text-gray-600">We offer a 30-day money-back guarantee if you're not satisfied with our services. After project kickoff, refunds are prorated based on work completed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Get Started?
            </h2>
            <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                Join hundreds of businesses that trust us with their digital presence
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                    Start Your Project <i class="fas fa-rocket ml-2"></i>
                </a>
                <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-indigo-600 transition">
                    Explore Services <i class="fas fa-compass ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    
    {{-- Money Back Guarantee --}}
    <section class="py-12 bg-green-50">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-center space-x-4">
                <i class="fas fa-shield-alt text-4xl text-green-600"></i>
                <div>
                    <h3 class="text-xl font-semibold">30-Day Money Back Guarantee</h3>
                    <p class="text-gray-600">If you're not completely satisfied, we'll refund your payment. No questions asked.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function selectPlan(plan) {
        // Show loading state
        const button = event.target;
        const originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
        
        // Get the annual/monthly state from Alpine.js store
        const isAnnual = Alpine.store('pricing').annual;
        
        console.log('Plan selected:', plan);
        console.log('Is annual:', isAnnual);
        
        // Make API call to create checkout session
        fetch('{{ route("payment.checkout") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                plan: plan,
                annual: isAnnual
            })
        })
        .then(response => {
            console.log('Response status:', response.status);
            
            if (!response.ok) {
                return response.text().then(text => {
                    console.error('Server response:', text);
                    try {
                        const json = JSON.parse(text);
                        throw json;
                    } catch (e) {
                        throw new Error('Server error: ' + response.status);
                    }
                });
            }
            return response.json();
        })
        .then(data => {
            console.log('Success data:', data);
            if (data.url) {
                // Redirect to Stripe Checkout
                window.location.href = data.url;
            } else {
                throw new Error(data.error || 'No checkout URL received');
            }
        })
        .catch(error => {
            console.error('Error details:', error);
            const errorMessage = error.error || error.message || 'An error occurred. Please try again.';
            alert(errorMessage);
            // Restore button
            button.disabled = false;
            button.innerHTML = originalText;
        });
    }
</script>
@endpush