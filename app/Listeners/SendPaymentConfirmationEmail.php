<?php

namespace App\Listeners;

namespace App\Listeners;

use App\Events\PaymentConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationEmail;

class SendPaymentConfirmationEmail
{
    /**
     * Handle the event.
     *
     * @param  PaymentConfirmed  $event
     * @return void
     */
    public function handle(PaymentConfirmed $event)
    {
        Mail::to($event->order->email)->send(new PaymentConfirmationEmail($event->order));
    }
}
