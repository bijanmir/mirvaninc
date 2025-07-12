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
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and using this website and services provided by {{ config('site.name') }}, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to these terms, please do not use our services.</p>
                
                <h2>2. Description of Services</h2>
                <p>{{ config('site.name') }} provides technology consulting and development services including but not limited to:</p>
                <ul>
                    <li>Custom application development</li>
                    <li>Website design and development</li>
                    <li>Digital marketing services</li>
                    <li>Digital transformation consulting</li>
                </ul>
                
                <h2>3. Payment Terms</h2>
                <p>Payment terms are specified in individual project agreements and proposals. Unless otherwise agreed:</p>
                <ul>
                    <li>All payments are processed securely through Stripe</li>
                    <li>Invoices are due within 30 days of receipt</li>
                    <li>Late payments may incur additional fees</li>
                    <li>Project work may be suspended for overdue payments</li>
                </ul>
                
                <h2>4. Intellectual Property</h2>
                <p>Upon full payment for services:</p>
                <ul>
                    <li>Client receives full ownership of custom-developed code and designs</li>
                    <li>{{ config('site.name') }} retains rights to general methodologies and frameworks</li>
                    <li>Third-party software and licenses remain property of their respective owners</li>
                    <li>Client grants {{ config('site.name') }} permission to use project as case study</li>
                </ul>
                
                <h2>5. Confidentiality</h2>
                <p>{{ config('site.name') }} agrees to maintain confidentiality of all client information and data. We implement appropriate security measures to protect sensitive information and comply with applicable data protection regulations.</p>
                
                <h2>6. Project Scope and Changes</h2>
                <p>Project scope is defined in written agreements. Changes to scope require written approval and may affect timeline and budget. {{ config('site.name') }} will provide estimates for additional work before proceeding.</p>
                
                <h2>7. Warranties and Disclaimers</h2>
                <p>{{ config('site.name') }} warrants that services will be performed in a professional manner. However:</p>
                <ul>
                    <li>No guarantee is made regarding specific business outcomes</li>
                    <li>Client is responsible for backup and data protection</li>
                    <li>Third-party service failures are not our responsibility</li>
                    <li>Software is provided "as is" after project completion</li>
                </ul>
                
                <h2>8. Limitation of Liability</h2>
                <p>In no event shall {{ config('site.name') }} be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of profits, data, or business interruption, arising from the use of our services.</p>
                
                <h2>9. Support and Maintenance</h2>
                <p>Support terms are specified in individual agreements. Standard support includes:</p>
                <ul>
                    <li>Bug fixes for reported issues</li>
                    <li>Technical support during business hours</li>
                    <li>Security updates for critical vulnerabilities</li>
                </ul>
                <p>Additional support and maintenance packages are available separately.</p>
                
                <h2>10. Termination</h2>
                <p>Either party may terminate services with written notice. Upon termination:</p>
                <ul>
                    <li>Client pays for all work completed to date</li>
                    <li>{{ config('site.name') }} delivers all completed work and project files</li>
                    <li>Confidentiality obligations continue post-termination</li>
                </ul>
                
                <h2>11. Governing Law</h2>
                <p>These terms are governed by the laws of the State of California. Any disputes will be resolved through arbitration in San Diego County, California.</p>
                
                <h2>12. Contact Information</h2>
                <p>For questions regarding these terms, please contact us:</p>
                <ul>
                    <li>Email: {{ config('site.contact.email') }}</li>
                    <li>Phone: {{ config('site.contact.phone') }}</li>
                    <li>Address: {{ config('site.contact.address.street') }}, {{ config('site.contact.address.city') }}, {{ config('site.contact.address.state') }} {{ config('site.contact.address.zip') }}</li>
                </ul>
                
                <h2>13. Updates to Terms</h2>
                <p>{{ config('site.name') }} reserves the right to update these terms at any time. Updated terms will be posted on this page with a new "Last updated" date. Continued use of services constitutes acceptance of updated terms.</p>
            </div>
        </div>
    </div>
</div>
@endsection