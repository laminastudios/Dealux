<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        // Return a JSON response instead of rendering a view
        return response()->json(['message' => 'Stripe API index route']);
    }

    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

        try {
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'php',
                            'product_data' => [
                                'name' => 'Maayong Gabii!!!',
                            ],
                            'unit_amount' => 2800, // PHP 28.00
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe.success'),
                'cancel_url' => url('/checkout'), // Redirect to /checkout on cancel
            ]);

            // Return the session URL as a JSON response
            return response()->json(['url' => $session->url]);
        } catch (\Exception $e) {
            // Handle errors and return a JSON response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success()
    {
        // Return a JSON response instead of rendering a view
        return response()->json(['message' => 'Payment was successful']);
    }
}
