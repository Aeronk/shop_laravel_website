<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveOrder(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'product_id' =>'required'
        ]);
        try {
            $order =Order::create([
                'email' => $request->email,
                'product_id' => $request->product_id,
                'status' => 'Created'
            ]);
            return redirect()->route('products.pay', $order->id)->with('success', 'Email added successfully');

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
