<?php

namespace App\Listeners;

namespace App\Listeners;

use App\Events\PaymentConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationEmail;
use App\Events\PaymentSuccessful;

class SendPaymentConfirmationEmail
{
    /**
     * Handle the event.
     *
     * @param  PaymentSuccessful  $event
     * @return void
     */
    public function handle(PaymentConfirmed $event)
    {
        $payment = $event->payment;
        $user = $payment->user;

        Mail::to($user->email)->send(new PaymentConfirmationEmail($payment));
    }
}
