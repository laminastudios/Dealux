<?php

namespace App\Http\Controllers;

class StripeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'php', // Currency set to PHP (Philippine pesos)
                        'product_data' => [
                            'name' => 'Maayong Gabii!!!',
                        ],
                        'unit_amount' => 2800, // Amount set to PHP 28.00 (2800 centavos)
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('index');
    }
}
