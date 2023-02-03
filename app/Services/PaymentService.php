<?php


namespace App\Services;


use Stripe\Charge;

class PaymentService
{

    public function secondPayment( array $data)
    {
        // Charge the customer for the second half of the product price
        $charge = Charge::create([
            'amount' => ($data['amount'] / 2),
            'currency' => 'usd',
            'description' => $data['description'],
            'source' => $data['token'],
        ]);
        return $charge;
    }

}
