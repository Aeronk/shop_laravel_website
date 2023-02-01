<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('home',['products'=>$products]);
    }

    public function singleProduct($id){
        $product = Product::findorfail($id);
        return view('product-detail',['product'=>$product]);

    }
}
