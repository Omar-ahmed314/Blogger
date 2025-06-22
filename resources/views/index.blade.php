<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body { background: #f7f7f7; font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: 80px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 12px #e0e0e0; padding: 40px 32px; text-align: center; }
        h1 { color: #2d6cdf; font-size: 2.5rem; margin-bottom: 24px; }
        .pricing-options { display: flex; justify-content: center; gap: 24px; margin: 32px 0; }
        .option { background: #f0f4fa; border: 2px solid #e0e7ef; border-radius: 8px; padding: 24px 32px; min-width: 160px; transition: border 0.2s, box-shadow 0.2s; cursor: pointer; }
        .option.selected, .option:hover { border: 2px solid #2d6cdf; box-shadow: 0 2px 8px #d0e2ff; }
        .option input[type="radio"] { accent-color: #2d6cdf; margin-right: 8px; }
        .option label { font-size: 1.1rem; color: #222; cursor: pointer; }
        .price { font-size: 1.7rem; color: #2d6cdf; font-weight: bold; margin-top: 8px; }
        button { background: #2d6cdf; color: #fff; border: none; border-radius: 5px; padding: 12px 32px; font-size: 1.1rem; cursor: pointer; transition: background 0.2s; margin-top: 24px; }
        button:hover { background: #1a4e9b; }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = document.querySelectorAll('.option');
            options.forEach(option => {
                option.addEventListener('click', function() {
                    options.forEach(o => o.classList.remove('selected'));
                    this.classList.add('selected');
                    this.querySelector('input[type="radio"]').checked = true;
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>👋 Welcome to Our Application!</h1>
        <form action="{{ route('payment.checkout') }}" method="POST">
            @csrf
            <div class="pricing-options">
                <div class="option selected">
                    <input type="radio" id="monthly" name="price_id" value="price_1RcnJZBNJtWVnZbCPw8g103L" checked>
                    <label for="monthly">Monthly</label>
                    <div class="price">200 EGP</div>
                </div>
                <div class="option">
                    <input type="radio" id="annual" name="price_id" value="price_1RcnJZBNJtWVnZbCxDVdt8Hj">
                    <label for="annual">Annually</label>
                    <div class="price">2000 EGP</div>
                </div>
            </div>
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>
