<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body { background: #f7f7f7; font-family: Arial, sans-serif; }
        .container { max-width: 480px; margin: 80px auto; background: #fff; border-radius: 12px; box-shadow: 0 2px 16px #e0e0e0; padding: 48px 32px; text-align: center; }
        .icon { font-size: 4rem; color: #4BB543; margin-bottom: 18px; }
        h1 { color: #4BB543; font-size: 2.2rem; margin-bottom: 16px; }
        p { color: #333; font-size: 1.15rem; margin-bottom: 24px; }
        .btn { background: #2d6cdf; color: #fff; border: none; border-radius: 5px; padding: 12px 32px; font-size: 1.1rem; cursor: pointer; transition: background 0.2s; text-decoration: none; display: inline-block; }
        .btn:hover { background: #1a4e9b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#10004;</div>
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase. Your payment has been processed successfully.<br>
        You now have access to all premium features.</p>
        <a href="{{ url('/') }}" class="btn">Back to Home</a>
    </div>
</body>
</html>
