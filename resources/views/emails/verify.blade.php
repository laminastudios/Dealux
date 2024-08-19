<!-- resources/views/emails/verify.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .email-header img {
            max-width: 200px;
        }
        .email-body {
            margin-bottom: 20px;
        }
        .email-body p {
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
        .verify-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .verify-button:hover {
            background-color: #0056b3;
        }
        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <!-- Add a logo or header image -->
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
        </div>
        <div class="email-body">
            <p>Hello {{ $user->user_name }},</p>
            <p>Thank you for registering with us. To complete your registration, please verify your email address by clicking the link below:</p>
            <div class="button-container">
                <a href="{{ $verificationUrl }}">Verify Email</a>
            </div>
        </div>
        <div class="email-footer">
            <p>If you did not register for this account, please ignore this email.</p>
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
