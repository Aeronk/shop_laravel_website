<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $image_name = $this->uploadImage($request, false);
             Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $image_name
            ]);
            return redirect()->route('products.index')->with('success', 'Product added successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error','Something went wrong');

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $image_name = $this->uploadImage($request, true, $product);
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $image_name
            ]);

            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update product.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    private function uploadImage($request, $update = false, $product = null)
    {
        if ($update) {
            Storage::delete('uploads/' . $product->image);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);

            return $image_name;
        }
        return $product->image ?? null;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
