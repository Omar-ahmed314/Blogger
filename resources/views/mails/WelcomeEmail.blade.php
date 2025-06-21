<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { background: #fff; max-width: 600px; margin: 40px auto; border-radius: 8px; box-shadow: 0 2px 8px #e0e0e0; padding: 32px; }
        h1 { color: #2d6cdf; }
        p { color: #333; font-size: 16px; }
        .footer { margin-top: 32px; color: #888; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ $user->name }}!</h1>
        <p>We're excited to have you join our community. Your account has been successfully created.</p>
        <p>Feel free to explore, connect, and make the most out of your experience with us.</p>
        <p>If you have any questions or need help, just reply to this email or visit our support page.</p>
        <p>Thank you for registering!</p>
        <div class="footer">
            &mdash; Blogger Team
        </div>
    </div>
</body>
</html>
