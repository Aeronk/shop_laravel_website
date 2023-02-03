<?php


namespace App\Helpers;


use App\Jobs\SecondPaymentJob;

class HalfPaymentProcessor extends StripePaymentProcessor
{

    public function chargeInitialPayment(array $data)
    {

        // Calculate initial payment amount
        $initialAmount = $data['amount'] / 2;
        // Call parent method to charge the customer
        return parent::charge([
            'amount' => $initialAmount,
            'description' => $data['description'],
            'token' => $data['token'],
        ]);

    }

    public function scheduleSecondPayment(array $data)
    {
        // Calculate second payment amount
        $secondAmount = $data['amount'] / 2;
        // Schedule the second payment using a job
        SecondPaymentJob::dispatch([
            'amount' => $secondAmount,
            'description' => $data['description'],
            'token' => $data['token'],
        ])->delay(5);
    }

}
