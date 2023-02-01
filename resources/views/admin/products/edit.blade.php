@extends('layouts.admin')

@section('title') Edit Product @endsection

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Add Product</h1>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                Product Form
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" method="post" enctype="multipart/form-data"  action="{{route('products.update', $product->id)}}">
                    @csrf
                    @method('put')
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                               required="" value="{{$product->name}}" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Price</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded"
                               value="{{$product->price}}"  id="price" name="price" type="text" required="" aria-label="Price">
                    </div>

                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Image</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="image" type="file"
                               required="" value="{{$product->image}}"  aria-label="Name">
                    </div>


                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded" type="submit">Save</button>
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
