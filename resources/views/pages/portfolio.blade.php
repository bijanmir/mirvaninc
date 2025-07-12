{{-- resources/views/pages/portfolio.blade.php --}}
@extends('layouts.app')

@section('title', 'Portfolio - ' . config('site.name'))
@section('description', 'Explore our portfolio of successful projects including custom applications, websites, and digital marketing campaigns for Fortune 500 companies and startups.')

@push('head')
    <style>
        /* Custom styles for portfolio grid */
        .portfolio-item {
            transition: all 0.3s ease;
        }
        .portfolio-item.hidden {
            display: none;
        }
        .portfolio-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Portfolio</h1>
                <p class="text-xl md:text-2xl text-indigo-100">
                    Discover how we've helped businesses transform their digital presence and achieve remarkable results
                </p>
            </div>
        </div>
    </section>
    
    {{-- Stats Section --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">{{ config('site.stats.projects_completed') }}</div>
                    <p class="text-gray-600">Projects Completed</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-purple-600 mb-2">50+</div>
                    <p class="text-gray-600">Happy Clients</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-green-600 mb-2">15</div>
                    <p class="text-gray-600">Industry Awards</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-orange-600 mb-2">{{ config('site.stats.years_experience') }}</div>
                    <p class="text-gray-600">Years Experience</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Portfolio Filter --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            {{-- Filter Buttons --}}
            <div class="flex flex-wrap justify-center gap-4 mb-12" x-data="{ activeFilter: 'all' }">
                <button @click="activeFilter = 'all'; filterProjects('all')"
                        :class="activeFilter === 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition">
                    <i class="fas fa-th mr-2"></i> All Projects
                </button>
                <button @click="activeFilter = 'applications'; filterProjects('applications')"
                        :class="activeFilter === 'applications' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition">
                    <i class="fas fa-code mr-2"></i> Applications
                </button>
                <button @click="activeFilter = 'websites'; filterProjects('websites')"
                        :class="activeFilter === 'websites' ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition">
                    <i class="fas fa-laptop mr-2"></i> Websites
                </button>
                <button @click="activeFilter = 'marketing'; filterProjects('marketing')"
                        :class="activeFilter === 'marketing' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition">
                    <i class="fas fa-chart-line mr-2"></i> Marketing
                </button>
            </div>
            
            {{-- Portfolio Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
                {{-- Project 1: Enterprise SaaS Platform --}}
                <div class="portfolio-item" data-category="applications">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-chart-bar text-white text-6xl opacity-20"></i>
                            </div>
                            <div class="absolute inset-0 portfolio-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white">
                                    <p class="text-sm mb-2">Custom Application</p>
                                    <h3 class="text-2xl font-bold">Enterprise Analytics Platform</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-xs font-medium">SaaS</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">React</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">AWS</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Enterprise Analytics Platform</h3>
                            <p class="text-gray-600 mb-4">Built a comprehensive analytics platform serving 10,000+ users with real-time data processing and customizable dashboards.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">For: Fortune 500 Client</span>
                                <button class="text-indigo-600 hover:text-indigo-700 font-medium">
                                    View Case Study <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Project 2: E-commerce Website --}}
                <div class="portfolio-item" data-category="websites">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-white text-6xl opacity-20"></i>
                            </div>
                            <div class="absolute inset-0 portfolio-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white">
                                    <p class="text-sm mb-2">E-commerce Website</p>
                                    <h3 class="text-2xl font-bold">Luxury Fashion Store</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-medium">E-commerce</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">Shopify Plus</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Luxury Fashion E-commerce</h3>
                            <p class="text-gray-600 mb-4">Designed and developed a high-end fashion e-commerce site with 300% increase in conversion rate.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Revenue: $2M+ annually</span>
                                <button class="text-purple-600 hover:text-purple-700 font-medium">
                                    View Case Study <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Project 3: Digital Marketing Campaign --}}
                <div class="portfolio-item" data-category="marketing">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-teal-600"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-bullhorn text-white text-6xl opacity-20"></i>
                            </div>
                            <div class="absolute inset-0 portfolio-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white">
                                    <p class="text-sm mb-2">Digital Marketing</p>
                                    <h3 class="text-2xl font-bold">B2B Lead Generation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">Google Ads</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">LinkedIn</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">B2B Lead Generation Campaign</h3>
                            <p class="text-gray-600 mb-4">Generated 5,000+ qualified leads with a 60% reduction in cost per acquisition through targeted campaigns.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">ROI: 450%</span>
                                <button class="text-green-600 hover:text-green-700 font-medium">
                                    View Case Study <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Project 4: Mobile Application --}}
                <div class="portfolio-item" data-category="applications">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-600"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-mobile-alt text-white text-6xl opacity-20"></i>
                            </div>
                            <div class="absolute inset-0 portfolio-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white">
                                    <p class="text-sm mb-2">Mobile Application</p>
                                    <h3 class="text-2xl font-bold">Healthcare App</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">iOS/Android</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">React Native</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Telemedicine Mobile App</h3>
                            <p class="text-gray-600 mb-4">Developed a HIPAA-compliant telemedicine app connecting patients with doctors, serving 50,000+ users.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">4.8★ App Store Rating</span>
                                <button class="text-blue-600 hover:text-blue-700 font-medium">
                                    View Case Study <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Project 5: Corporate Website --}}
                <div class="portfolio-item" data-category="websites">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-building text-white text-6xl opacity-20"></i>
                            </div>
                            <div class="absolute inset-0 portfolio-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white">
                                    <p class="text-sm mb-2">Corporate Website</p>
                                    <h3 class="text-2xl font-bold">Financial Services Site</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">WordPress</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">Multi-language</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Global Financial Services</h3>
                            <p class="text-gray-600 mb-4">Created a multi-language corporate website for a global financial firm with 20+ country-specific versions.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Traffic: 1M+ monthly</span>
                                <button class="text-gray-700 hover:text-gray-900 font-medium">
                                    View Case Study <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Project 6: Social Media Campaign --}}
                <div class="portfolio-item" data-category="marketing">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group cursor-pointer hover:shadow-2xl transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-500 to-rose-600"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fab fa-instagram text-white text-6xl opacity-20"></i>
                            </div>
                            <div class="absolute inset-0 portfolio-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white">
                                    <p class="text-sm mb-2">Social Media Marketing</p>
                                    <h3 class="text-2xl font-bold">Lifestyle Brand Campaign</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-xs font-medium">Instagram</span>
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">TikTok</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Viral Social Campaign</h3>
                            <p class="text-gray-600 mb-4">Launched a social media campaign that reached 10M+ users and increased brand awareness by 400%.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Engagement: 2M+</span>
                                <button class="text-pink-600 hover:text-pink-700 font-medium">
                                    View Case Study <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Load More Button --}}
            <div class="text-center mt-12">
                <button class="bg-indigo-600 text-white px-8 py-3 rounded-full hover:bg-indigo-700 transition">
                    Load More Projects <i class="fas fa-plus ml-2"></i>
                </button>
            </div>
        </div>
    </section>
    
    {{-- Client Testimonials --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Client Success Stories</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Don't just take our word for it - hear what our clients have to say about working with us
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Charles+Schwab&background=4f46e5&color=fff&size=60" alt="Charles Schwab" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Digital Innovation Team</h4>
                            <p class="text-gray-600">Charles Schwab</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <p class="text-gray-600 italic">
                        "Mirvan Inc delivered an exceptional trading platform that exceeded our expectations. Their technical expertise and attention to detail resulted in a 40% increase in user engagement."
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Infosys&background=10b981&color=fff&size=60" alt="Infosys" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">VP of Technology</h4>
                            <p class="text-gray-600">Infosys</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <p class="text-gray-600 italic">
                        "The enterprise application Mirvan built has transformed our internal operations. They delivered on time, on budget, and continue to provide excellent support."
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Be Our Next Success Story?
            </h2>
            <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                Let's discuss your project and how we can help you achieve remarkable results
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
@endsection

@push('scripts')
<script>
    // Portfolio filtering function
    function filterProjects(category) {
        const items = document.querySelectorAll('.portfolio-item');
        
        items.forEach(item => {
            if (category === 'all') {
                item.classList.remove('hidden');
            } else if (item.dataset.category === category) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    }
</script>
@endpush