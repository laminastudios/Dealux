<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeApi extends Controller
{
    public function index()
    {
        // Return a JSON response
        return response()->json(['message' => 'Stripe API index route'], 200);
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('stripe.stripe_sk'));

        try {
            $session = Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'php',
                            'product_data' => [
                                'name' => 'Maayong Gabii!!!',
                            ],
                            'unit_amount' => 2800, // PHP 28.00 in cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe.success'),
                'cancel_url' => url('/checkout'), // Redirect to /checkout on cancel
            ]);

            // Log the session URL for debugging
            Log::info('Stripe session created successfully:', ['url' => $session->url]);

            // Return the session URL as a JSON response
            return response()->json(['url' => $session->url], 200);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Stripe session creation failed:', ['error' => $e->getMessage()]);

            // Handle errors and return a JSON response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success()
    {
        // Return a JSON response for successful payment
        return response()->json(['message' => 'Payment was successful'], 200);
    }
}
