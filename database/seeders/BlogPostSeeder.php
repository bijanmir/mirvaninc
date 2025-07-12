<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The Future of Web Development: Trends to Watch in 2025',
                'slug' => 'future-web-development-trends-2025',
                'excerpt' => 'Explore the cutting-edge technologies and methodologies shaping the future of web development, from AI integration to progressive web apps.',
                'content' => $this->getWebDevContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1627398242454-45a1465c2479?w=800&h=400&fit=crop',
                'meta_title' => 'Future of Web Development: 2025 Trends | Mirvan Inc',
                'meta_description' => 'Discover the latest web development trends for 2025 including AI integration, progressive web apps, and modern frameworks.',
                'author_name' => 'Sarah Johnson',
                'author_email' => 'sarah@mirvaninc.com',
                'category' => 'Web Development',
                'tags' => ['Web Development', 'AI', 'Progressive Web Apps', 'React', 'Trends'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(2),
                'views' => 1250
            ],
            [
                'title' => 'Building Scalable SaaS Applications: A Complete Guide',
                'slug' => 'building-scalable-saas-applications-guide',
                'excerpt' => 'Learn the essential architecture patterns and best practices for building SaaS applications that can scale from startup to enterprise.',
                'content' => $this->getSaaSContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=800&h=400&fit=crop',
                'meta_title' => 'Building Scalable SaaS Applications Guide | Mirvan Inc',
                'meta_description' => 'Complete guide to building scalable SaaS applications with modern architecture patterns and best practices.',
                'author_name' => 'Michael Chen',
                'author_email' => 'michael@mirvaninc.com',
                'category' => 'SaaS Development',
                'tags' => ['SaaS', 'Scalability', 'Architecture', 'Cloud', 'Microservices'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(5),
                'views' => 892
            ],
            [
                'title' => 'Digital Marketing ROI: How to Measure Success in 2025',
                'slug' => 'digital-marketing-roi-measure-success-2025',
                'excerpt' => 'Master the art of measuring digital marketing ROI with advanced analytics, attribution models, and KPIs that matter.',
                'content' => $this->getMarketingContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=400&fit=crop',
                'meta_title' => 'Digital Marketing ROI Measurement Guide 2025 | Mirvan Inc',
                'meta_description' => 'Learn how to accurately measure digital marketing ROI with advanced analytics and attribution models.',
                'author_name' => 'Emily Rodriguez',
                'author_email' => 'emily@mirvaninc.com',
                'category' => 'Digital Marketing',
                'tags' => ['Digital Marketing', 'ROI', 'Analytics', 'Attribution', 'KPIs'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(7),
                'views' => 654
            ],
            [
                'title' => 'Cloud Migration Strategies: Moving from Legacy to Modern Infrastructure',
                'slug' => 'cloud-migration-strategies-legacy-modern-infrastructure',
                'excerpt' => 'A comprehensive guide to migrating legacy systems to cloud infrastructure while minimizing downtime and maximizing efficiency.',
                'content' => $this->getCloudContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&h=400&fit=crop',
                'meta_title' => 'Cloud Migration Strategies Guide | Mirvan Inc',
                'meta_description' => 'Expert guide to cloud migration strategies for moving from legacy systems to modern cloud infrastructure.',
                'author_name' => 'David Kim',
                'author_email' => 'david@mirvaninc.com',
                'category' => 'Cloud Computing',
                'tags' => ['Cloud Migration', 'AWS', 'Legacy Systems', 'Infrastructure', 'DevOps'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(10),
                'views' => 743
            ],
            [
                'title' => 'UI/UX Design Principles That Drive Conversions',
                'slug' => 'ui-ux-design-principles-drive-conversions',
                'excerpt' => 'Discover the psychology-backed design principles that turn visitors into customers and improve your conversion rates.',
                'content' => $this->getDesignContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?w=800&h=400&fit=crop',
                'meta_title' => 'UI/UX Design Principles for Conversions | Mirvan Inc',
                'meta_description' => 'Learn psychology-backed UI/UX design principles that increase conversions and improve user experience.',
                'author_name' => 'Lisa Thompson',
                'author_email' => 'lisa@mirvaninc.com',
                'category' => 'Design',
                'tags' => ['UI/UX Design', 'Conversions', 'Psychology', 'User Experience', 'CRO'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(14),
                'views' => 523
            ],
            [
                'title' => 'Cybersecurity Best Practices for Modern Businesses',
                'slug' => 'cybersecurity-best-practices-modern-businesses',
                'excerpt' => 'Essential cybersecurity strategies to protect your business from evolving threats in the digital landscape.',
                'content' => $this->getSecurityContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=800&h=400&fit=crop',
                'meta_title' => 'Cybersecurity Best Practices for Businesses | Mirvan Inc',
                'meta_description' => 'Essential cybersecurity best practices and strategies to protect your modern business from digital threats.',
                'author_name' => 'John Martinez',
                'author_email' => 'john@mirvaninc.com',
                'category' => 'Security',
                'tags' => ['Cybersecurity', 'Security', 'Business Protection', 'Data Privacy', 'Risk Management'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(18),
                'views' => 432
            ],
            [
                'title' => 'The Power of API-First Development',
                'slug' => 'power-api-first-development',
                'excerpt' => 'Learn why API-first development is revolutionizing how we build applications and integrate systems.',
                'content' => $this->getAPIContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1518186285589-2f7649de83e0?w=800&h=400&fit=crop',
                'meta_title' => 'API-First Development Benefits | Mirvan Inc',
                'meta_description' => 'Discover the benefits of API-first development and how it revolutionizes application building and system integration.',
                'author_name' => 'Sarah Johnson',
                'author_email' => 'sarah@mirvaninc.com',
                'category' => 'API Development',
                'tags' => ['API Development', 'Integration', 'Microservices', 'REST', 'GraphQL'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(21),
                'views' => 367
            ],
            [
                'title' => 'E-commerce Optimization: Converting Visitors to Customers',
                'slug' => 'ecommerce-optimization-converting-visitors-customers',
                'excerpt' => 'Proven strategies to optimize your e-commerce site for higher conversions and increased revenue.',
                'content' => $this->getEcommerceContent(),
                'featured_image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=400&fit=crop',
                'meta_title' => 'E-commerce Optimization Strategies | Mirvan Inc',
                'meta_description' => 'Proven e-commerce optimization strategies to convert more visitors into customers and increase revenue.',
                'author_name' => 'Michael Chen',
                'author_email' => 'michael@mirvaninc.com',
                'category' => 'E-commerce',
                'tags' => ['E-commerce', 'Conversion Optimization', 'Online Store', 'Revenue', 'CRO'],
                'status' => 'published',
                'published_at' => Carbon::now()->subDays(25),
                'views' => 289
            ]
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }

    private function getWebDevContent()
    {
        return '<h2>Introduction</h2>
<p>The web development landscape is evolving at breakneck speed. As we move through 2025, several key trends are reshaping how we build and deploy web applications. From AI-powered development tools to the rise of edge computing, developers need to stay ahead of these changes to remain competitive.</p>

<h2>1. AI-Powered Development Tools</h2>
<p>Artificial Intelligence is no longer just a buzzword in web development. AI-powered code completion, automated testing, and intelligent debugging tools are becoming standard parts of the developer toolkit. GitHub Copilot, Tabnine, and similar tools are dramatically reducing development time while improving code quality.</p>

<h2>2. Progressive Web Apps (PWAs) Go Mainstream</h2>
<p>PWAs continue to bridge the gap between web and mobile applications. With improved offline capabilities, push notifications, and app-like experiences, PWAs are becoming the preferred choice for businesses looking to reach users across all platforms with a single codebase.</p>

<h2>3. WebAssembly (WASM) Adoption</h2>
<p>WebAssembly is enabling high-performance applications in the browser. From gaming to data visualization, WASM allows developers to run near-native performance applications directly in web browsers, opening up new possibilities for web-based software.</p>

<h2>4. Serverless and Edge Computing</h2>
<p>The shift towards serverless architectures and edge computing is accelerating. Platforms like Vercel, Netlify, and Cloudflare Workers are making it easier to deploy applications closer to users, reducing latency and improving performance globally.</p>

<h2>Conclusion</h2>
<p>Staying current with these trends is crucial for any web development team. At Mirvan Inc, we continuously evolve our practices to incorporate these emerging technologies, ensuring our clients benefit from the latest innovations in web development.</p>';
    }

    private function getSaaSContent()
    {
        return '<h2>Understanding SaaS Architecture</h2>
<p>Building a successful SaaS application requires careful planning of your architecture from day one. The decisions you make early will determine how well your application scales as your user base grows from hundreds to millions of users.</p>

<h2>Multi-Tenancy Patterns</h2>
<p>One of the most critical decisions in SaaS development is choosing the right multi-tenancy model. Whether you opt for single-tenant, multi-tenant with shared databases, or hybrid approaches, each has implications for security, performance, and cost.</p>

<h2>Database Design for Scale</h2>
<p>Your database architecture will make or break your SaaS application. Consider sharding strategies, read replicas, and caching layers from the beginning. Technologies like PostgreSQL with proper indexing, Redis for caching, and CDNs for static assets are essential.</p>

<h2>API Design and Versioning</h2>
<p>A well-designed API is the backbone of any SaaS application. Implement proper versioning strategies, rate limiting, and authentication from the start. RESTful APIs with GraphQL for complex queries provide flexibility for different client needs.</p>

<h2>Security and Compliance</h2>
<p>SaaS applications handle sensitive customer data, making security paramount. Implement OAuth 2.0, encrypt data at rest and in transit, and ensure compliance with regulations like GDPR, CCPA, and SOC 2.</p>

<h2>Monitoring and Observability</h2>
<p>As your application scales, visibility becomes crucial. Implement comprehensive logging, metrics collection, and alerting systems. Tools like Datadog, New Relic, or Prometheus can help you maintain system health.</p>';
    }

    private function getMarketingContent()
    {
        return '<h2>The Challenge of ROI Measurement</h2>
<p>Measuring digital marketing ROI has never been more complex. With multiple touchpoints, cross-device journeys, and privacy regulations limiting tracking capabilities, marketers need sophisticated approaches to understand their true impact.</p>

<h2>Attribution Models That Actually Work</h2>
<p>Move beyond last-click attribution. Implement multi-touch attribution models that consider the entire customer journey. Time-decay, position-based, and data-driven attribution models provide more accurate insights into campaign performance.</p>

<h2>Key Metrics to Track</h2>
<p>Focus on metrics that matter to your business:</p>
<ul>
<li>Customer Acquisition Cost (CAC)</li>
<li>Lifetime Value (LTV)</li>
<li>LTV:CAC Ratio</li>
<li>Marketing Qualified Leads (MQL)</li>
<li>Sales Qualified Leads (SQL)</li>
<li>Conversion Rate by Channel</li>
</ul>

<h2>Advanced Analytics Setup</h2>
<p>Implement proper tracking infrastructure using Google Analytics 4, Facebook Pixel, and UTM parameters. Create custom dashboards that align with your business objectives and provide actionable insights.</p>

<h2>Privacy-First Measurement</h2>
<p>With the decline of third-party cookies, focus on first-party data collection. Implement server-side tracking, leverage customer data platforms (CDPs), and build direct relationships with your audience.</p>';
    }

    private function getCloudContent()
    {
        return '<h2>Assessing Your Current Infrastructure</h2>
<p>Before beginning any cloud migration, conduct a thorough assessment of your existing systems. Identify dependencies, performance requirements, and compliance needs that will influence your migration strategy.</p>

<h2>Choosing the Right Migration Strategy</h2>
<p>The "6 Rs" of cloud migration provide a framework for your approach:</p>
<ul>
<li><strong>Rehost:</strong> Lift and shift to the cloud</li>
<li><strong>Replatform:</strong> Minor optimizations during migration</li>
<li><strong>Refactor:</strong> Rebuild for cloud-native architecture</li>
<li><strong>Retire:</strong> Decommission unnecessary applications</li>
<li><strong>Retain:</strong> Keep on-premises for specific reasons</li>
<li><strong>Repurchase:</strong> Move to SaaS alternatives</li>
</ul>

<h2>Planning for Minimal Downtime</h2>
<p>Implement blue-green deployments, database replication, and gradual traffic shifting to minimize business disruption during migration. Plan for rollback scenarios and conduct thorough testing in staging environments.</p>

<h2>Security and Compliance Considerations</h2>
<p>Cloud migration doesn\'t eliminate security responsibilities. Implement the shared responsibility model, configure proper IAM policies, and ensure data encryption both in transit and at rest.</p>';
    }

    private function getDesignContent()
    {
        return '<h2>The Psychology Behind Conversions</h2>
<p>Understanding user psychology is fundamental to creating designs that convert. Cognitive biases, decision-making patterns, and emotional triggers all influence how users interact with your interface.</p>

<h2>Visual Hierarchy and Attention Flow</h2>
<p>Guide users through your interface using strategic placement of elements, contrast, and white space. The F-pattern and Z-pattern reading behaviors should inform your layout decisions.</p>

<h2>Color Psychology in Action</h2>
<p>Colors evoke emotions and influence decisions. Red creates urgency, blue builds trust, and green suggests safety. Use color strategically to guide user actions and reinforce your brand message.</p>

<h2>Social Proof and Trust Signals</h2>
<p>Incorporate testimonials, reviews, security badges, and social media followers to build credibility. Users are more likely to convert when they see others have successfully used your product or service.</p>

<h2>Optimizing for Mobile Conversions</h2>
<p>With mobile traffic dominating, ensure your design works seamlessly across devices. Thumb-friendly navigation, simplified forms, and fast loading times are crucial for mobile conversions.</p>';
    }

    private function getSecurityContent()
    {
        return '<h2>The Evolving Threat Landscape</h2>
<p>Cyber threats are becoming more sophisticated, with ransomware, phishing, and supply chain attacks on the rise. Modern businesses need comprehensive security strategies that evolve with the threat landscape.</p>

<h2>Zero Trust Architecture</h2>
<p>Implement zero trust principles: never trust, always verify. This approach assumes no implicit trust within the network and requires verification for every access request.</p>

<h2>Employee Training and Awareness</h2>
<p>Your employees are often the first line of defense against cyber threats. Regular security training, phishing simulations, and clear security policies are essential components of your security strategy.</p>

<h2>Data Backup and Recovery</h2>
<p>Implement the 3-2-1 backup rule: 3 copies of critical data, on 2 different media types, with 1 copy stored offsite. Regular testing of recovery procedures ensures you can restore operations quickly after an incident.</p>';
    }

    private function getAPIContent()
    {
        return '<h2>What is API-First Development?</h2>
<p>API-first development means designing and building the API before implementing the user interface. This approach ensures consistent, well-documented interfaces that can support multiple clients and use cases.</p>

<h2>Benefits of API-First Approach</h2>
<p>API-first development enables faster development cycles, better testing capabilities, and easier integration with third-party services. It also supports the development of mobile apps, web applications, and IoT devices from the same backend.</p>

<h2>Best Practices for API Design</h2>
<p>Follow REST principles, use clear naming conventions, implement proper error handling, and provide comprehensive documentation. Consider using OpenAPI specifications for consistent API documentation.</p>';
    }

    private function getEcommerceContent()
    {
        return '<h2>Understanding Your Conversion Funnel</h2>
<p>E-commerce optimization starts with understanding where users drop off in your funnel. Analyze each step from product discovery to checkout completion to identify optimization opportunities.</p>

<h2>Product Page Optimization</h2>
<p>High-quality images, detailed descriptions, customer reviews, and clear pricing information are essential for product pages. Implement zoom functionality, multiple angles, and size guides where appropriate.</p>

<h2>Streamlining the Checkout Process</h2>
<p>Reduce cart abandonment by simplifying your checkout process. Offer guest checkout options, display security badges, and provide multiple payment methods including digital wallets.</p>

<h2>Personalization and Recommendations</h2>
<p>Use browsing history, purchase data, and user preferences to provide personalized product recommendations. AI-powered recommendation engines can significantly increase average order value.</p>';
    }
}