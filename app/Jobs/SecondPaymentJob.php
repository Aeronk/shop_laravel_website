<?php

namespace App\Jobs;

use App\Events\PaymentConfirmed;
use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Stripe\Charge;

class SecondPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(PaymentService $paymentService)
    {
        $charge = $paymentService->secondPayment($this->data);
        if ($charge) {
            $order = Order::with('product')->find($this->data->order_id);
            event( new PaymentConfirmed($order));
        }

    }

}
