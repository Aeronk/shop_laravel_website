<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class PaymentConfirmationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('emails.payment_confirmation')
            ->to($this->order->email, 'Buyer')
            ->subject('Payment Confirmation for Order #000'.$this->order->id)
            ->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
    }
}

