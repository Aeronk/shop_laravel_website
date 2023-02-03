<?php

namespace Tests\Feature;

use App\Helpers\StripePaymentProcessor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{

    /**
     * Test the charge method of the payment processor.
     *
     * @return void
     */
    public function testCharge()
    {
        $paymentProcessor = new StripePaymentProcessor;
        $data = [
            'amount' => 100,
            'currency' => 'usd',
            'description' => "buy test",
            'token' =>'visa_tok',
        ];

        $response = $paymentProcessor->charge($data );

        $this->assertEquals($response['status'], 'success');
    }


}
