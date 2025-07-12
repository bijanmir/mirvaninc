{{-- resources/views/pages/services.blade.php --}}
@extends('layouts.app')

@section('title', 'Our Services - ' . config('site.name'))
@section('description', 'Explore our comprehensive technology services including custom applications, websites, digital marketing, and digital transformation consulting.')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-purple-600 to-indigo-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Services</h1>
                <p class="text-xl md:text-2xl text-purple-100">
                    End-to-end technology solutions that transform businesses and drive measurable results
                </p>
            </div>
        </div>
    </section>
    
    {{-- Service Overview Cards --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Custom Applications --}}
                <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 transition">
                        <i class="fas fa-code text-2xl text-indigo-600 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Custom Applications</h3>
                    <p class="text-gray-600 mb-4">Enterprise-grade solutions tailored to your needs</p>
                    <a href="#applications" class="text-indigo-600 font-semibold hover:text-indigo-700">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                {{-- Website Development --}}
                <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition">
                        <i class="fas fa-laptop text-2xl text-purple-600 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Website Development</h3>
                    <p class="text-gray-600 mb-4">Stunning websites that convert visitors into customers</p>
                    <a href="#websites" class="text-purple-600 font-semibold hover:text-purple-700">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                {{-- Digital Marketing --}}
                <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-600 transition">
                        <i class="fas fa-chart-line text-2xl text-green-600 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Data-driven campaigns that maximize your ROI</p>
                    <a href="#marketing" class="text-green-600 font-semibold hover:text-green-700">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                {{-- Digital Transformation --}}
                <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-orange-600 transition">
                        <i class="fas fa-rocket text-2xl text-orange-600 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Digital Transformation</h3>
                    <p class="text-gray-600 mb-4">Strategic consulting to modernize your business</p>
                    <a href="#transformation" class="text-orange-600 font-semibold hover:text-orange-700">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Custom Applications Section --}}
    <section id="applications" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-indigo-100 text-indigo-600 px-4 py-2 rounded-full mb-4">
                        <i class="fas fa-code mr-2"></i> Custom Applications
                    </div>
                    <h2 class="text-4xl font-bold mb-6">Enterprise-Grade Custom Applications</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        We build powerful, scalable applications that solve complex business challenges. From SaaS platforms to internal tools, our custom solutions are designed to grow with your business.
                    </p>
                    
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start">
                            <i class="fas fa-cloud text-indigo-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Cloud-Native Architecture</h4>
                                <p class="text-sm text-gray-600">Built for AWS, Azure, or Google Cloud</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-mobile-alt text-indigo-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Mobile Applications</h4>
                                <p class="text-sm text-gray-600">Native iOS and Android apps</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-plug text-indigo-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold mb-1">API Development</h4>
                                <p class="text-sm text-gray-600">RESTful and GraphQL APIs</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-database text-indigo-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold mb-1">Data Processing</h4>
                                <p class="text-sm text-gray-600">Real-time analytics and reporting</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('contact') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition">
                        Start Your Project <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-xl">
                    <h3 class="text-2xl font-semibold mb-6">Technologies We Use</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fab fa-react text-3xl text-blue-500 mb-2"></i>
                            <p class="text-sm font-medium">React</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fab fa-laravel text-3xl text-red-500 mb-2"></i>
                            <p class="text-sm font-medium">Laravel</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fab fa-python text-3xl text-yellow-500 mb-2"></i>
                            <p class="text-sm font-medium">Python</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fab fa-node-js text-3xl text-green-500 mb-2"></i>
                            <p class="text-sm font-medium">Node.js</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fab fa-aws text-3xl text-orange-500 mb-2"></i>
                            <p class="text-sm font-medium">AWS</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fab fa-docker text-3xl text-blue-600 mb-2"></i>
                            <p class="text-sm font-medium">Docker</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Website Development Section --}}
    <section id="websites" class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="bg-white p-8 rounded-2xl shadow-xl">
                        <h3 class="text-2xl font-semibold mb-6">Website Packages</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-purple-600 pl-4">
                                <h4 class="font-semibold text-lg">Starter Website</h4>
                                <p class="text-gray-600 mb-2">Perfect for small businesses and startups</p>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>5-7 responsive pages</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Mobile-optimized design</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Basic SEO setup</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Contact form integration</li>
                                </ul>
                                <p class="text-purple-600 font-bold mt-3">Starting at ${{ number_format(config('site.pricing.starter.price')) }}</p>
                            </div>
                            
                            <div class="border-l-4 border-purple-600 pl-4">
                                <h4 class="font-semibold text-lg">Professional Website</h4>
                                <p class="text-gray-600 mb-2">For growing businesses needing more features</p>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>10-15 custom pages</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Content Management System</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Advanced SEO & Analytics</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>E-commerce ready</li>
                                </ul>
                                <p class="text-purple-600 font-bold mt-3">Starting at ${{ number_format(config('site.pricing.professional.price')) }}</p>
                            </div>
                            
                            <div class="border-l-4 border-purple-600 pl-4">
                                <h4 class="font-semibold text-lg">Enterprise Website</h4>
                                <p class="text-gray-600 mb-2">Fully custom solutions for large organizations</p>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Unlimited pages</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Custom functionality</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Multi-language support</li>
                                    <li><i class="fas fa-check text-green-500 mr-2"></i>Priority support</li>
                                </ul>
                                <p class="text-purple-600 font-bold mt-3">Custom Pricing</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="inline-block bg-purple-100 text-purple-600 px-4 py-2 rounded-full mb-4">
                        <i class="fas fa-laptop mr-2"></i> Website Development
                    </div>
                    <h2 class="text-4xl font-bold mb-6">Websites That Drive Results</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Create a powerful online presence with websites that combine stunning design, flawless functionality, and conversion optimization. We build sites that work as hard as you do.
                    </p>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Responsive design for all devices</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>SEO optimization for organic traffic</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Fast loading times (under 3 seconds)</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Secure hosting and SSL certificates</span>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <a href="{{ route('pricing') }}" class="inline-block bg-purple-600 text-white px-6 py-3 rounded-full hover:bg-purple-700 transition">
                            View Pricing <i class="fas fa-tag ml-2"></i>
                        </a>
                        <a href="{{ route('portfolio') }}" class="inline-block border-2 border-purple-600 text-purple-600 px-6 py-3 rounded-full hover:bg-purple-600 hover:text-white transition">
                            See Portfolio <i class="fas fa-images ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Digital Marketing Section --}}
    <section id="marketing" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <div class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-chart-line mr-2"></i> Digital Marketing
                </div>
                <h2 class="text-4xl font-bold mb-6">Data-Driven Digital Marketing</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Maximize your ROI with targeted campaigns across Google Ads, Facebook, and other platforms. We use data and analytics to continuously optimize your marketing spend.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fab fa-google text-4xl text-blue-500 mb-4"></i>
                    <h4 class="font-semibold mb-2">Google Ads</h4>
                    <p class="text-sm text-gray-600">Search, Display, Shopping & YouTube campaigns</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fab fa-facebook text-4xl text-blue-600 mb-4"></i>
                    <h4 class="font-semibold mb-2">Facebook Ads</h4>
                    <p class="text-sm text-gray-600">Facebook & Instagram advertising</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-search text-4xl text-green-500 mb-4"></i>
                    <h4 class="font-semibold mb-2">SEO Services</h4>
                    <p class="text-sm text-gray-600">Organic search optimization</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-envelope text-4xl text-purple-500 mb-4"></i>
                    <h4 class="font-semibold mb-2">Email Marketing</h4>
                    <p class="text-sm text-gray-600">Automated campaigns & newsletters</p>
                </div>
            </div>
            
            {{-- Results Statistics --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h3 class="text-2xl font-semibold text-center mb-8">Proven Results for Our Clients</h3>
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-green-600 mb-2">+285%</div>
                        <p class="text-gray-600">Average ROI Increase</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">-45%</div>
                        <p class="text-gray-600">Cost Per Acquisition</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-purple-600 mb-2">+156%</div>
                        <p class="text-gray-600">Conversion Rate</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-orange-600 mb-2">2.5M+</div>
                        <p class="text-gray-600">Leads Generated</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Digital Transformation Section --}}
    <section id="transformation" class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                        <i class="fas fa-rocket mr-2"></i> Digital Transformation
                    </div>
                    <h2 class="text-4xl font-bold mb-6">Transform Your Business for the Digital Age</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Navigate the digital landscape with confidence. Our strategic consulting helps you modernize operations, improve efficiency, and create new revenue streams through technology.
                    </p>
                    
                    {{-- Transformation Process --}}
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-600 rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="font-semibold">1</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Assessment & Strategy</h4>
                                <p class="text-sm text-gray-600">Analyze your current state and identify opportunities</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-600 rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="font-semibold">2</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Roadmap Development</h4>
                                <p class="text-sm text-gray-600">Create a clear path aligned with business goals</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-600 rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="font-semibold">3</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Implementation</h4>
                                <p class="text-sm text-gray-600">Execute transformation with minimal disruption</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-600 rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                <span class="font-semibold">4</span>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Optimization</h4>
                                <p class="text-sm text-gray-600">Continuous improvement and scaling</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-orange-50 to-yellow-50 p-8 rounded-2xl">
                    <h3 class="text-2xl font-semibold mb-6">Transformation Services</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-lg">
                            <i class="fas fa-cloud-upload-alt text-orange-600 text-2xl mb-2"></i>
                            <h5 class="font-medium mb-1">Cloud Migration</h5>
                            <p class="text-xs text-gray-600">Move to AWS, Azure, or GCP</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg">
                            <i class="fas fa-cogs text-orange-600 text-2xl mb-2"></i>
                            <h5 class="font-medium mb-1">Process Automation</h5>
                            <p class="text-xs text-gray-600">Streamline workflows</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg">
                            <i class="fas fa-chart-pie text-orange-600 text-2xl mb-2"></i>
                            <h5 class="font-medium mb-1">Data Analytics</h5>
                            <p class="text-xs text-gray-600">Business intelligence</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg">
                            <i class="fas fa-shield-alt text-orange-600 text-2xl mb-2"></i>
                            <h5 class="font-medium mb-1">Cybersecurity</h5>
                            <p class="text-xs text-gray-600">Protect your assets</p>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="inline-block w-full text-center bg-orange-600 text-white px-6 py-3 rounded-full hover:bg-orange-700 transition mt-6">
                        Get Transformation Roadmap <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Why Choose Us Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Why Choose {{ config('site.name') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We combine enterprise experience with startup agility to deliver exceptional results
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-trophy text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Enterprise Experience</h3>
                    <p class="text-gray-600">Trusted by Fortune 500 companies including {{ implode(', ', config('site.clients')) }}</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-bolt text-4xl text-blue-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Rapid Delivery</h3>
                    <p class="text-gray-600">Agile methodology ensures fast time-to-market without compromising quality</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-bullseye text-4xl text-red-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Results Focused</h3>
                    <p class="text-gray-600">Data-driven approach with measurable outcomes and continuous optimization</p>
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
                Let's discuss how we can help transform your business with our technology solutions
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">
                    Schedule Free Consultation <i class="fas fa-calendar-alt ml-2"></i>
                </a>
                <a href="{{ route('pricing') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-indigo-600 transition">
                    View Pricing <i class="fas fa-tag ml-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection