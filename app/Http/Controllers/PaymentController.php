<?php

namespace App\Http\Controllers;

use App\Events\PaymentConfirmed;
use App\Helpers\HalfPaymentProcessor;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function processPayment(Request $request, $id, HalfPaymentProcessor $processor)
    {
        $order = Order::with('product')->findOrFail($id);
        $data = [
            'amount' => $order->amount,
            'description' => $request->description,
            'token' => $request->stripeToken,
            'order_id' => $order->id,
        ];
        try {
            $processor->chargeInitialPayment($data);
            $processor->scheduleSecondPayment($data);
            return redirect()->route('thank-you')->with('message', 'Payment successful!');

        } catch (\Exception $e) {
            return redirect()->route('thank-you')->with('message', 'Payment failed: '.$e->getMessage());
        }


    }

    public function pay($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('payments.pay',['order'=>$order]);
    }

    public function emailReg(Product $product){

        return view('payments.email',['product'=>$product]);
    }

    public function thankYou()
    {
        return view('frontend.thank-you');
    }
}
