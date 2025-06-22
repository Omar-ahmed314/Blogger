<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_API_SECRET_KEY'));

            // create stripe session
            $checkout_session = Session::create([
                'line_items' => [

                    [
                        'price' => $request->price_id,
                        'quantity' => 1
                    ]
                ],
                'mode' => 'subscription',
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);

            return redirect($checkout_session->url);
        } catch (Exception $e) {
            return response()->json(['message' => 'error occured', 'error' => $e->getMessage()], 404);
        }
    }

    public function success() {}

    public function cancel() {}
}
