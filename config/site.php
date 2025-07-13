<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Site Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains all the site-wide configuration values for Mirvan Inc
    |
    */

    // Basic Information
    'name' => 'Mirvan Inc',
    'tagline' => 'Enterprise Technology Solutions',
    'description' => 'Mirvan Inc delivers enterprise-grade technology solutions including custom applications, websites, and digital marketing services. Trusted by Fortune 500 companies like Infosys and Charles Schwab.',
    'keywords' => 'web development, app development, digital marketing, La Jolla, San Diego, custom software, technology services',
    
    // Contact Information
    'contact' => [
        'phone' => '(619) 887-4315',
        'phone_link' => '+16198874315',
        'email' => 'hello@mirvaninc.com',
        'address' => [
            'street' => '9255 Towne Centre Drive',
            'city' => 'San Diego',
            'state' => 'CA',
            'zip' => '92122',
            'country' => 'United States',
            'coordinates' => [
                'latitude' => 32.8761404,
                'longitude' => -117.2065839,
            ]
        ],
        'hours' => 'Monday-Friday 9:00 AM - 6:00 PM PST',
        'hours_schema' => 'Mo-Fr 09:00-18:00',
    ],
    
    // Social Media
    'social' => [
        'facebook' => 'https://www.facebook.com/mirvaninc',
        'twitter' => 'https://twitter.com/mirvaninc',
        'linkedin' => 'https://www.linkedin.com/company/mirvaninc',
        'instagram' => 'https://www.instagram.com/mirvaninc',
        'youtube' => '',
    ],
    
    // Company Stats
    'stats' => [
        'projects_completed' => '150+',
        'client_satisfaction' => '98%',
        'years_experience' => '10+',
        'support_availability' => '24/7',
    ],
    
    // Services
    'services' => [
        'applications' => [
            'title' => 'Custom Applications',
            'description' => 'Enterprise-grade applications built with cutting-edge technologies tailored to your business needs.',
            'icon' => 'code',
            'color' => 'indigo',
            'features' => [
                'Cloud-native architecture',
                'API development',
                'Mobile apps',
                'Real-time data processing'
            ]
        ],
        'websites' => [
            'title' => 'Website Development',
            'description' => 'Stunning, high-performance websites that convert visitors into customers and grow your business.',
            'icon' => 'desktop',
            'color' => 'purple',
            'features' => [
                'Responsive design',
                'SEO optimization',
                'E-commerce integration',
                'CMS development'
            ]
        ],
        'marketing' => [
            'title' => 'Digital Marketing',
            'description' => 'Data-driven Google Ads and Facebook campaigns that maximize ROI and scale your growth.',
            'icon' => 'chart',
            'color' => 'green',
            'features' => [
                'Google Ads management',
                'Facebook advertising',
                'SEO services',
                'Conversion optimization'
            ]
        ],
        'transformation' => [
            'title' => 'Digital Transformation',
            'description' => 'Strategic consulting to modernize your technology stack and accelerate business innovation.',
            'icon' => 'lightning',
            'color' => 'orange',
            'features' => [
                'Technology assessment',
                'Process automation',
                'Cloud migration',
                'Data analytics'
            ]
        ],
    ],
    
    // Client Testimonials
    'testimonials' => [
        [
            'name' => 'Sarah Johnson',
            'position' => 'CTO',
            'company' => 'Tech Innovations',
            'content' => 'Mirvan Inc transformed our digital presence completely. Their team delivered beyond our expectations and on time.',
            'rating' => 5,
        ],
        [
            'name' => 'Michael Chen',
            'position' => 'CEO',
            'company' => 'Global Logistics',
            'content' => 'The custom application Mirvan built for us has streamlined our operations and saved us thousands of hours.',
            'rating' => 5,
        ],
        [
            'name' => 'Emily Rodriguez',
            'position' => 'VP Marketing',
            'company' => 'FinTech Plus',
            'content' => 'Their digital marketing expertise helped us achieve a 300% increase in qualified leads within 6 months.',
            'rating' => 5,
        ],
    ],
    
    // Client Logos
    'clients' => [
        'Infosys',
        'Charles Schwab',
        'Arrow Electronics',
    ],
    
    // Pricing Plans
    'pricing' => [
        'starter' => [
            'name' => 'Starter',
            'price' => 2500,
            'price_id' => env('STRIPE_STARTER_PRICE_ID'),
            'features' => [
                '5-7 page website',
                'Responsive design',
                'Basic SEO',
                '3 months support'
            ],
        ],
        'professional' => [
            'name' => 'Professional',
            'price' => 5000,
            'price_id' => env('STRIPE_PROFESSIONAL_PRICE_ID'),
            'popular' => true,
            'features' => [
                '10-15 page website',
                'CMS integration',
                'Advanced SEO',
                '6 months support',
                'Analytics setup'
            ],
        ],
        'enterprise' => [
            'name' => 'Enterprise',
            'price' => null,
            'contact' => true,
            'features' => [
                'Custom solution',
                'Unlimited pages',
                'Full customization',
                '12 months support',
                'Priority support'
            ],
        ],
    ],
    
    // SEO Defaults
    'seo' => [
        'default_title' => 'Mirvan Inc - Technology Services | Web Development, Apps & Digital Marketing in La Jolla',
        'title_separator' => ' | ',
        'default_description' => 'Mirvan Inc delivers enterprise-grade technology solutions including custom applications, websites, and digital marketing services.',
        'og_image' => '/images/og-default.jpg',
    ],
    
    // Process Steps
    'process' => [
        [
            'number' => 1,
            'title' => 'Discovery',
            'description' => 'We dive deep into your business goals and technical requirements',
            'color' => 'indigo',
        ],
        [
            'number' => 2,
            'title' => 'Design',
            'description' => 'Creating intuitive designs that delight users and drive engagement',
            'color' => 'purple',
        ],
        [
            'number' => 3,
            'title' => 'Development',
            'description' => 'Building robust solutions with clean, scalable code',
            'color' => 'green',
        ],
        [
            'number' => 4,
            'title' => 'Launch',
            'description' => 'Seamless deployment with ongoing support and optimization',
            'color' => 'orange',
        ],
    ],
    
    // Team Members
    'team' => [
        [
            'name' => 'Bijan Mirvan',
            'position' => 'CEO & Founder',
            'bio' => 'Over 15 years of experience in enterprise technology.',
            'image' => 'team/john-doe.jpg',
        ],
        [
            'name' => 'Stefano Bieler',
            'position' => 'CTO',
            'bio' => 'Expert in cloud architecture and scalable systems.',
            'image' => 'team/jane-smith.jpg',
        ],
        [
            'name' => 'Mike Wilson',
            'position' => 'Head of Design',
            'bio' => 'Creating beautiful, user-centered experiences.',
            'image' => 'team/mike-wilson.jpg',
        ],
    ],
];