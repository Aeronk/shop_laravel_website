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

        $response = $paymentProcessor->charge(100, 'tok_visa');

        $this->assertEquals($response['status'], 'success');
    }

    /**
     * Test the refund method of the payment processor.
     *
     * @return void
     */
    public function testRefund()
    {
        $paymentProcessor = new PaymentProcessor;

        $response = $paymentProcessor->refund(100, 'tok_visa');

        $this->assertEquals($response['status'], 'success');
    }
}
