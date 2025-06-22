<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Nette\NotImplementedException;
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
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel'),
            ]);

            return redirect($checkout_session->url);
        } catch (Exception $e) {
            return response()->json(['message' => 'error occured', 'error' => $e->getMessage()], 404);
        }
    }

    public function success(Request $request)
    {
        $session_id = $request->session_id;
        return View('payments.success');
    }

    public function cancel()
    {
        throw new NotImplementedException();
    }
}
