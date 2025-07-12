{{-- resources/views/emails/contact-admin.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #4F46E5;">New Contact Form Submission</h2>
        
        <p>You have received a new contact form submission from your website.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Name:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Email:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Phone:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['phone'] ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Service Interest:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ ucfirst($data['service']) }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Budget:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $data['budget'] }}</td>
            </tr>
        </table>
        
        <h3 style="color: #4F46E5;">Message:</h3>
        <div style="background-color: #f7f7f7; padding: 15px; border-radius: 5px;">
            {{ $data['message'] }}
        </div>
        
        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">
        
        <p style="color: #666; font-size: 14px;">
            This email was sent from the contact form on {{ config('app.url') }}
        </p>
    </div>
</body>
</html>

{{-- resources/views/emails/contact-user.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank you for contacting {{ config('site.name') }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #4F46E5;">Thank You for Contacting {{ config('site.name') }}</h2>
        
        <p>Hi {{ $data['first_name'] }},</p>
        
        <p>Thank you for reaching out to us! We've received your message and appreciate your interest in our services.</p>
        
        <p>Our team will review your inquiry and get back to you within 24 hours. If you have an urgent request, please don't hesitate to call us at {{ config('site.contact.phone') }}.</p>
        
        <h3 style="color: #4F46E5;">Your Message Summary:</h3>
        <div style="background-color: #f7f7f7; padding: 15px; border-radius: 5px;">
            <p><strong>Service Interest:</strong> {{ ucfirst($data['service']) }}</p>
            <p><strong>Budget Range:</strong> {{ $data['budget'] }}</p>
            <p><strong>Message:</strong><br>{{ $data['message'] }}</p>
        </div>
        
        <p>In the meantime, feel free to:</p>
        <ul>
            <li>Check out our <a href="{{ config('app.url') }}/portfolio" style="color: #4F46E5;">portfolio</a> to see our recent work</li>
            <li>Read our <a href="{{ config('app.url') }}/blog" style="color: #4F46E5;">blog</a> for insights and tips</li>
            <li>Follow us on social media for updates</li>
        </ul>
        
        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">
        
        <p style="color: #666; font-size: 14px;">
            Best regards,<br>
            The {{ config('site.name') }} Team<br>
            {{ config('site.contact.email') }}<br>
            {{ config('site.contact.phone') }}
        </p>
    </div>
</body>
</html>