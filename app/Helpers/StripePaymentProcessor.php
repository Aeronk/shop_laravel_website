<?php


namespace App\Helpers;


use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentProcessor extends BasePaymentProcessor
{

    public function charge(array $data)
    {
        // Initialize the Stripe API
        Stripe::setApiKey(config('services.stripe.secret'));
        // Charge the customer
        $charge = Charge::create([
            'amount' => $data['amount'],
            'currency' => 'usd',
            'description' => $data['description'],
            'source' => $data['token'],
        ]);
        return $charge;
    }
}
