<?php


namespace App\Services;


use App\Models\Product;
use Stripe\Charge;
use Stripe\Stripe;

class ProductService
{
    public function charge(Request $request, Product $product)
    {
        Stripe::setApiKey(config('stripe.secret'));

        $token = $request->stripeToken;
        $charge = Charge::create([
            'amount' => $product->price * 100,
            'currency' => 'usd',
            'description' => $product->name,
            'source' => $token,
        ]);

        return redirect()->route('products.index')->with('success', 'Payment successful');
    }

}
