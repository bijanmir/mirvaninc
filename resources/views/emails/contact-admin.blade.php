{{-- resources/views/emails/contact-admin.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #1a1a1a; color: white; padding: 20px; text-align: center; }
        .content { background-color: #f9f9f9; padding: 30px; border-radius: 5px; margin-top: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { color: #333; margin-left: 10px; }
        .message-box { background-color: white; padding: 15px; border-radius: 5px; margin-top: 20px; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
        .priority-high { color: #d9534f; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
            <p>Reference ID: #{{ $contact->id }}</p>
        </div>
        
        <div class="content">
            <h2>Contact Details</h2>
            
            <div class="field">
                <span class="label">Name:</span>
                <span class="value">{{ $contact->first_name }} {{ $contact->last_name }}</span>
            </div>
            
            <div class="field">
                <span class="label">Email:</span>
                <span class="value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
            </div>
            
            @if($contact->phone)
            <div class="field">
                <span class="label">Phone:</span>
                <span class="value">{{ $contact->phone }}</span>
            </div>
            @endif
            
            <div class="field">
                <span class="label">Service Interest:</span>
                <span class="value">{{ ucfirst(str_replace('_', ' ', $contact->service)) }}</span>
            </div>
            
            <div class="field">
                <span class="label">Budget Range:</span>
                <span class="value {{ $contact->budget == '50k-100k' || $contact->budget == '100k+' ? 'priority-high' : '' }}">
                    ${{ $contact->budget }}
                </span>
            </div>
            
            <div class="field">
                <span class="label">Submitted:</span>
                <span class="value">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</span>
            </div>
            
            <div class="message-box">
                <h3>Message:</h3>
                <p>{{ $contact->message }}</p>
            </div>
            
            <div style="margin-top: 30px; text-align: center;">
                <a href="{{ url('/admin/contacts/' . $contact->id) }}" 
                   style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                    View in Admin Panel
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent from the contact form at {{ config('app.url') }}</p>
            <p>© {{ date('Y') }} Mirvan Inc. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

{{-- resources/views/emails/contact-user.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for contacting Mirvan Inc</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #1a1a1a; color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .summary { background-color: #f9f9f9; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; padding-top: 20px; border-top: 1px solid #eee; }
        .button { display: inline-block; background-color: #007bff; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Contacting Us!</h1>
            <p>We've received your message</p>
        </div>
        
        <div class="content">
            <p>Dear {{ $contact->first_name }},</p>
            
            <p>Thank you for reaching out to Mirvan Inc. We've successfully received your inquiry and appreciate your interest in our services.</p>
            
            <p><strong>What happens next?</strong></p>
            <ul>
                <li>Our team will review your message within the next 24 hours</li>
                <li>We'll reach out to you via email or phone to discuss your project</li>
                <li>We'll provide a tailored solution based on your needs and budget</li>
            </ul>
            
            <div class="summary">
                <h3>Your Submission Summary:</h3>
                <p><strong>Reference ID:</strong> #{{ $contact->id }}</p>
                <p><strong>Service Interest:</strong> {{ ucfirst(str_replace('_', ' ', $contact->service)) }}</p>
                <p><strong>Budget Range:</strong> ${{ $contact->budget }}</p>
                <p><strong>Submitted on:</strong> {{ $contact->created_at->format('F j, Y \a\t g:i A') }}</p>
            </div>
            
            <p>In the meantime, feel free to explore our website for more information about our services:</p>
            
            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="button">Visit Our Website</a>
            </div>
            
            <p>If you have any urgent questions, please don't hesitate to reach out to us directly at <a href="mailto:hello@mirvaninc.com">hello@mirvaninc.com</a>.</p>
            
            <p>Best regards,<br>
            The Mirvan Inc Team</p>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} Mirvan Inc. All rights reserved.</p>
            <p>This email was sent to {{ $contact->email }} because you submitted a contact form on our website.</p>
            <p>If you did not submit this form, please let us know immediately.</p>
        </div>
    </div>
</body>
</html>