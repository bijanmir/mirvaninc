<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PortfolioProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Enterprise Analytics Platform',
                'slug' => 'enterprise-analytics-platform',
                'description' => 'Built a comprehensive analytics platform serving 10,000+ users with real-time data processing and customizable dashboards.',
                'content' => $this->getAnalyticsContent(),
                'client_name' => 'Fortune 500 Financial Services',
                'client_industry' => 'Financial Services',
                'project_url' => null, // Confidential
                'featured_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?w=800&h=600&fit=crop'
                ],
                'category' => 'applications',
                'tags' => ['Enterprise', 'Analytics', 'Real-time', 'Dashboard'],
                'technologies' => ['React', 'Node.js', 'PostgreSQL', 'Redis', 'AWS'],
                'duration' => '8 months',
                'team_size' => 12,
                'budget_range' => '500k-1M',
                'results' => [
                    '10,000+ daily active users',
                    '99.9% uptime achieved',
                    '60% reduction in report generation time',
                    '$2M annual cost savings for client'
                ],
                'testimonial' => [
                    'content' => 'Mirvan Inc delivered an exceptional platform that transformed our analytics capabilities. The real-time dashboards and intuitive interface have revolutionized how our teams make data-driven decisions.',
                    'author' => 'Sarah Johnson',
                    'position' => 'Chief Technology Officer',
                    'company' => 'Fortune 500 Client'
                ],
                'status' => 'published',
                'featured' => true,
                'completed_at' => Carbon::now()->subMonths(3),
                'sort_order' => 1
            ],
            [
                'title' => 'Luxury Fashion E-commerce',
                'slug' => 'luxury-fashion-ecommerce',
                'description' => 'Designed and developed a high-end fashion e-commerce site with 300% increase in conversion rate.',
                'content' => $this->getFashionContent(),
                'client_name' => 'Bella Couture',
                'client_industry' => 'Fashion & Retail',
                'project_url' => 'https://bellacouture.example.com',
                'featured_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800&h=600&fit=crop'
                ],
                'category' => 'websites',
                'tags' => ['E-commerce', 'Luxury', 'Fashion', 'Mobile-first'],
                'technologies' => ['Shopify Plus', 'React', 'Node.js', 'Stripe'],
                'duration' => '4 months',
                'team_size' => 6,
                'budget_range' => '100k-250k',
                'results' => [
                    '300% increase in conversion rate',
                    '$2M+ annual revenue generated',
                    '50% improvement in mobile experience',
                    '4.8/5 customer satisfaction rating'
                ],
                'testimonial' => [
                    'content' => 'The new website has completely transformed our online presence. Sales have tripled, and our customers love the seamless shopping experience.',
                    'author' => 'Maria Gonzalez',
                    'position' => 'CEO',
                    'company' => 'Bella Couture'
                ],
                'status' => 'published',
                'featured' => true,
                'completed_at' => Carbon::now()->subMonths(2),
                'sort_order' => 2
            ],
            [
                'title' => 'FinTech Mobile Banking App',
                'slug' => 'fintech-mobile-banking-app',
                'description' => 'Developed a secure mobile banking application with biometric authentication and real-time transaction processing.',
                'content' => $this->getBankingContent(),
                'client_name' => 'NextGen Bank',
                'client_industry' => 'Financial Technology',
                'project_url' => null, // App store links
                'featured_image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?w=800&h=600&fit=crop'
                ],
                'category' => 'applications',
                'tags' => ['FinTech', 'Mobile App', 'Security', 'Banking'],
                'technologies' => ['React Native', 'Node.js', 'MongoDB', 'AWS', 'Blockchain'],
                'duration' => '10 months',
                'team_size' => 15,
                'budget_range' => '1M+',
                'results' => [
                    '100,000+ downloads in first month',
                    '4.9/5 app store rating',
                    'Bank-grade security compliance',
                    '25% reduction in customer service calls'
                ],
                'testimonial' => [
                    'content' => 'Mirvan Inc delivered a world-class banking app that exceeded our security requirements and user experience expectations.',
                    'author' => 'David Chen',
                    'position' => 'Chief Digital Officer',
                    'company' => 'NextGen Bank'
                ],
                'status' => 'published',
                'featured' => true,
                'completed_at' => Carbon::now()->subMonths(1),
                'sort_order' => 3
            ],
            [
                'title' => 'Healthcare Telemedicine Platform',
                'slug' => 'healthcare-telemedicine-platform',
                'description' => 'HIPAA-compliant telemedicine platform connecting patients with doctors, serving 50,000+ users.',
                'content' => $this->getHealthcareContent(),
                'client_name' => 'HealthConnect Pro',
                'client_industry' => 'Healthcare',
                'project_url' => 'https://healthconnectpro.example.com',
                'featured_image' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1584515933487-779824d29309?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=800&h=600&fit=crop'
                ],
                'category' => 'applications',
                'tags' => ['Healthcare', 'Telemedicine', 'HIPAA', 'Video Chat'],
                'technologies' => ['React', 'WebRTC', 'Node.js', 'PostgreSQL', 'AWS'],
                'duration' => '6 months',
                'team_size' => 8,
                'budget_range' => '250k-500k',
                'results' => [
                    '50,000+ registered users',
                    'HIPAA compliance achieved',
                    '98% patient satisfaction rate',
                    '40% reduction in no-show appointments'
                ],
                'testimonial' => [
                    'content' => 'The platform has revolutionized how we deliver care to our patients. The video quality and security features are outstanding.',
                    'author' => 'Dr. Emily Roberts',
                    'position' => 'Chief Medical Officer',
                    'company' => 'HealthConnect Pro'
                ],
                'status' => 'published',
                'featured' => false,
                'completed_at' => Carbon::now()->subMonths(4),
                'sort_order' => 4
            ],
            [
                'title' => 'B2B Lead Generation Campaign',
                'slug' => 'b2b-lead-generation-campaign',
                'description' => 'Generated 5,000+ qualified leads with a 60% reduction in cost per acquisition through targeted campaigns.',
                'content' => $this->getLeadGenContent(),
                'client_name' => 'TechSolutions Inc',
                'client_industry' => 'B2B Software',
                'project_url' => null,
                'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=800&h=600&fit=crop'
                ],
                'category' => 'marketing',
                'tags' => ['Lead Generation', 'B2B Marketing', 'Google Ads', 'LinkedIn'],
                'technologies' => ['Google Ads', 'LinkedIn Ads', 'HubSpot', 'Salesforce', 'Analytics'],
                'duration' => '12 months',
                'team_size' => 4,
                'budget_range' => '50k-100k',
                'results' => [
                    '5,000+ qualified leads generated',
                    '60% reduction in cost per acquisition',
                    '450% ROI achieved',
                    '35% increase in sales qualified leads'
                ],
                'testimonial' => [
                    'content' => 'Mirvan Inc\'s marketing expertise transformed our lead generation. The quality of leads and ROI exceeded all expectations.',
                    'author' => 'Michael Thompson',
                    'position' => 'VP of Marketing',
                    'company' => 'TechSolutions Inc'
                ],
                'status' => 'published',
                'featured' => false,
                'completed_at' => Carbon::now()->subMonths(1),
                'sort_order' => 5
            ],
            [
                'title' => 'Global Manufacturing Website',
                'slug' => 'global-manufacturing-website',
                'description' => 'Multi-language corporate website for a global manufacturing firm with 20+ country-specific versions.',
                'content' => $this->getManufacturingContent(),
                'client_name' => 'GlobalMfg Corp',
                'client_industry' => 'Manufacturing',
                'project_url' => 'https://globalmfg.example.com',
                'featured_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=800&h=600&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1565514020179-026b92b84bb6?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=600&fit=crop'
                ],
                'category' => 'websites',
                'tags' => ['Corporate', 'Multi-language', 'Manufacturing', 'Global'],
                'technologies' => ['WordPress', 'PHP', 'MySQL', 'CloudFlare', 'WPML'],
                'duration' => '5 months',
                'team_size' => 7,
                'budget_range' => '100k-250k',
                'results' => [
                    '1M+ monthly visitors',
                    '20+ localized versions',
                    '45% increase in international inquiries',
                    '95/100 Google PageSpeed score'
                ],
                'testimonial' => [
                    'content' => 'The new website perfectly represents our global presence while maintaining local relevance in each market.',
                    'author' => 'Jennifer Liu',
                    'position' => 'Global Marketing Director',
                    'company' => 'GlobalMfg Corp'
                ],
                'status' => 'published',
                'featured' => false,
                'completed_at' => Carbon::now()->subMonths(5),
                'sort_order' => 6
            ]
        ];

        foreach ($projects as $project) {
            PortfolioProject::create($project);
        }
    }

    private function getAnalyticsContent()
    {
        return '<h2>Project Overview</h2>
<p>Our client, a Fortune 500 financial services company, needed to modernize their analytics infrastructure to support real-time decision making across multiple business units. The existing system was fragmented, slow, and couldn\'t handle the volume of data required for modern analytics.</p>

<h2>The Challenge</h2>
<p>The legacy system had several critical issues:</p>
<ul>
<li>Reports took hours to generate, making real-time analysis impossible</li>
<li>Data was siloed across different departments</li>
<li>No unified view of customer interactions</li>
<li>Scaling issues during peak usage periods</li>
<li>Limited mobile access for executives</li>
</ul>

<h2>Our Solution</h2>
<p>We designed and built a cloud-native analytics platform with the following features:</p>
<ul>
<li>Real-time data processing using Apache Kafka and Redis</li>
<li>Interactive dashboards with drill-down capabilities</li>
<li>Mobile-responsive design for on-the-go access</li>
<li>Role-based access control for data security</li>
<li>Automated report generation and alerting</li>
<li>API integration with existing systems</li>
</ul>

<h2>Technical Implementation</h2>
<p>The platform was built using modern technologies:</p>
<ul>
<li><strong>Frontend:</strong> React with TypeScript for type safety</li>
<li><strong>Backend:</strong> Node.js with Express and GraphQL API</li>
<li><strong>Database:</strong> PostgreSQL with read replicas</li>
<li><strong>Caching:</strong> Redis for high-performance data access</li>
<li><strong>Infrastructure:</strong> AWS with auto-scaling capabilities</li>
</ul>

<h2>Results</h2>
<p>The new platform delivered exceptional results:</p>
<ul>
<li>Report generation time reduced from hours to seconds</li>
<li>10,000+ daily active users across the organization</li>
<li>99.9% uptime with robust monitoring and alerting</li>
<li>$2M annual cost savings through operational efficiency</li>
<li>95% user satisfaction rating in post-launch surveys</li>
</ul>';
    }

    private function getFashionContent()
    {
        return '<h2>Project Overview</h2>
<p>Bella Couture, a luxury fashion brand, needed a complete digital transformation of their online presence. Their existing website was outdated, difficult to navigate, and not optimized for mobile devices, resulting in poor conversion rates and lost sales.</p>

<h2>The Challenge</h2>
<p>The client faced several critical issues:</p>
<ul>
<li>Outdated design that didn\'t reflect the luxury brand</li>
<li>Poor mobile experience with high bounce rates</li>
<li>Complicated checkout process leading to cart abandonment</li>
<li>Slow page load times affecting SEO rankings</li>
<li>Limited inventory management capabilities</li>
</ul>

<h2>Our Approach</h2>
<p>We took a user-centered design approach, focusing on:</p>
<ul>
<li>Elegant, minimalist design reflecting the luxury brand</li>
<li>Mobile-first responsive design</li>
<li>Streamlined checkout process</li>
<li>High-quality product photography integration</li>
<li>Advanced search and filtering capabilities</li>
<li>Personalized product recommendations</li>
</ul>

<h2>Results</h2>
<p>The redesigned website delivered outstanding results:</p>
<ul>
<li>300% increase in conversion rate</li>
<li>$2M+ in annual revenue generated</li>
<li>50% improvement in mobile user experience</li>
<li>Page load times reduced by 70%</li>
<li>4.8/5 customer satisfaction rating</li>
</ul>';
    }

    private function getBankingContent()
    {
        return '<h2>Project Overview</h2>
<p>NextGen Bank required a secure, user-friendly mobile banking application that would compete with established financial institutions while maintaining the highest security standards.</p>

<h2>Security Implementation</h2>
<p>Security was paramount in this project:</p>
<ul>
<li>Biometric authentication (fingerprint and face recognition)</li>
<li>End-to-end encryption for all transactions</li>
<li>Multi-factor authentication</li>
<li>Real-time fraud detection algorithms</li>
<li>PCI DSS compliance</li>
</ul>

<h2>Key Features</h2>
<ul>
<li>Account management and transaction history</li>
<li>Money transfers and bill payments</li>
<li>Mobile check deposit</li>
<li>Budget tracking and financial insights</li>
<li>Customer support chat integration</li>
<li>ATM locator with real-time availability</li>
</ul>';
    }

    private function getHealthcareContent()
    {
        return '<h2>Project Overview</h2>
<p>HealthConnect Pro needed a HIPAA-compliant telemedicine platform to enable remote consultations between patients and healthcare providers during the pandemic and beyond.</p>

<h2>Compliance & Security</h2>
<p>Healthcare data requires the highest level of protection:</p>
<ul>
<li>HIPAA compliance for patient data protection</li>
<li>End-to-end encrypted video calls</li>
<li>Secure patient record storage</li>
<li>Audit trails for all system access</li>
<li>Role-based access control</li>
</ul>

<h2>Platform Features</h2>
<ul>
<li>HD video consultations with screen sharing</li>
<li>Electronic health records integration</li>
<li>Prescription management system</li>
<li>Appointment scheduling and reminders</li>
<li>Patient portal for medical history access</li>
<li>Insurance verification system</li>
</ul>';
    }

    private function getLeadGenContent()
    {
        return '<h2>Campaign Overview</h2>
<p>TechSolutions Inc needed to scale their B2B lead generation efforts to support aggressive growth targets while maintaining lead quality and reducing acquisition costs.</p>

<h2>Strategy Development</h2>
<p>We developed a multi-channel approach:</p>
<ul>
<li>Google Ads targeting high-intent keywords</li>
<li>LinkedIn advertising for B2B professionals</li>
<li>Content marketing and SEO optimization</li>
<li>Marketing automation workflows</li>
<li>Lead scoring and qualification systems</li>
</ul>

<h2>Campaign Results</h2>
<ul>
<li>5,000+ qualified leads generated</li>
<li>60% reduction in cost per acquisition</li>
<li>450% return on ad spend</li>
<li>35% increase in sales qualified leads</li>
<li>90% improvement in lead quality scores</li>
</ul>';
    }

    private function getManufacturingContent()
    {
        return '<h2>Project Overview</h2>
<p>GlobalMfg Corp required a new corporate website that would serve their global presence across 20+ countries while maintaining brand consistency and local relevance.</p>

<h2>Localization Strategy</h2>
<p>We implemented comprehensive localization:</p>
<ul>
<li>20+ language translations</li>
<li>Country-specific content and case studies</li>
<li>Local contact information and support</li>
<li>Currency and unit conversions</li>
<li>Regional compliance information</li>
</ul>

<h2>Technical Implementation</h2>
<ul>
<li>WordPress multisite architecture</li>
<li>CDN optimization for global performance</li>
<li>SEO optimization for each market</li>
<li>Integrated CRM and lead tracking</li>
<li>Advanced analytics and reporting</li>
</ul>';
    }
}