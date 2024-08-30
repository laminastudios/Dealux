<?php

namespace App\Services;

use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeApi
{
    public function __construct()
    {
        Stripe::setApiKey(config('stripe.stripe_sk'));
    }

    public function createCheckoutSession(array $lineItems, string $successUrl, string $cancelUrl)
    {
        try {
            return Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => $successUrl,
                'cancel_url' => $cancelUrl,
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
