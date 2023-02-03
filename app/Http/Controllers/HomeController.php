<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::latest()->get();
        return view('frontend.home',['products'=>$products]);
    }

    public function singleProduct($id)
    {
        $product = Product::findorfail($id);
        return view('frontend.product-detail',['product'=>$product]);

    }


}
