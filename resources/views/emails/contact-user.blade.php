{{-- resources/views/emails/contact-user.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank you for contacting {{ config('site.name') }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%); color: white; padding: 30px 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: white; padding: 30px 20px; border: 1px solid #e5e7eb; }
        .footer { background: #f9fafb; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; border: 1px solid #e5e7eb; border-top: none; }
        .summary-box { background: #f7f7f7; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .cta-button { display: inline-block; background: #4F46E5; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 10px 5px; }
        .social-links { margin: 20px 0; }
        .social-links a { display: inline-block; margin: 0 10px; color: #6b7280; text-decoration: none; }
        ul { padding-left: 20px; }
        li { margin: 8px 0; }
        .highlight { color: #4F46E5; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 28px;">Thank You!</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">We've received your message</p>
        </div>
        
        <div class="content">
            <p>Hi <strong>{{ $data['first_name'] }}</strong>,</p>
            
            <p>Thank you for reaching out to {{ config('site.name') }}! We've received your message and appreciate your interest in our services.</p>
            
            <p>Our team will review your inquiry and get back to you within <span class="highlight">24 hours</span>. If you have an urgent request, please don't hesitate to call us at <strong>{{ config('site.contact.phone') }}</strong>.</p>
            
            <div class="summary-box">
                <h3 style="margin-top: 0; color: #4F46E5;">Your Message Summary:</h3>
                <p><strong>Service Interest:</strong> {{ ucfirst(str_replace(['_', '-'], ' ', $data['service'])) }}</p>
                <p><strong>Budget Range:</strong> ${{ str_replace(['k', '-'], ['000', ' - $'], $data['budget']) }}</p>
                @if($data['phone'])
                <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
                @endif
                <p><strong>Reference ID:</strong> #{{ $data['id'] ?? 'N/A' }}</p>
                <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                    <strong>Your Message:</strong><br>
                    <em>{{ $data['message'] }}</em>
                </div>
            </div>
            
            <p>In the meantime, feel free to:</p>
            <ul>
                <li>Check out our <a href="{{ config('app.url') }}/portfolio" style="color: #4F46E5;">portfolio</a> to see our recent work</li>
                <li>Read our <a href="{{ config('app.url') }}/blog" style="color: #4F46E5;">blog</a> for insights and tips</li>
                <li>Learn more about our <a href="{{ config('app.url') }}/services" style="color: #4F46E5;">services</a></li>
                <li>Follow us on social media for updates</li>
            </ul>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ config('app.url') }}/portfolio" class="cta-button">View Our Work</a>
                <a href="{{ config('app.url') }}/about" class="cta-button" style="background: #7C3AED;">Learn About Us</a>
            </div>
        </div>
        
        <div class="footer">
            <div class="social-links">
                @if(config('site.social.linkedin'))
                <a href="{{ config('site.social.linkedin') }}">LinkedIn</a>
                @endif
                @if(config('site.social.twitter'))
                <a href="{{ config('site.social.twitter') }}">Twitter</a>
                @endif
                @if(config('site.social.facebook'))
                <a href="{{ config('site.social.facebook') }}">Facebook</a>
                @endif
            </div>
            
            <p style="color: #6b7280; font-size: 14px; margin: 10px 0;">
                <strong>{{ config('site.name') }}</strong><br>
                {{ config('site.contact.address.street') }}<br>
                {{ config('site.contact.address.city') }}, {{ config('site.contact.address.state') }} {{ config('site.contact.address.zip') }}<br>
                <a href="mailto:{{ config('site.contact.email') }}" style="color: #4F46E5;">{{ config('site.contact.email') }}</a> | 
                <a href="tel:{{ config('site.contact.phone_link') }}" style="color: #4F46E5;">{{ config('site.contact.phone') }}</a>
            </p>
            
            <p style="color: #9ca3af; font-size: 12px; margin: 20px 0 0 0;">
                This email was sent because you submitted a contact form on our website. 
                If you didn't submit this form, please ignore this email.
            </p>
        </div>
    </div>
</body>
</html>