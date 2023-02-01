<?php

namespace App\Http\Controllers;

use App\Helpers\PaymentProcessor;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPayment(Request $request, PaymentProcessor $processor)
    {
        // Call the charge method on the concrete implementation
        $charge = $processor->charge([
            'amount' => $request->amount,
            'description' => $request->description,
            'token' => $request->stripeToken,
        ]);

        return redirect()->route('thank_you')->with('success', 'Payment Successful');

    }

    public function thankYou()
    {
        return view('thank_you');
    }
}
