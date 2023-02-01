@extends('layouts.main')

@section('content')

    <div class="bg-white">
        <h3 class="mb-5 text-center w-700" spellcheck="false">View Tranding Products</h3>
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
                @forelse($products as $product)
                <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
                    <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-96">
                        <img src="{{$product->image}}" alt="{{$product->name}}" class="h-full w-full object-cover object-center sm:h-full sm:w-full">
                    </div>
                    <div class="flex flex-1 flex-col space-y-2 p-4">
                        <h3 class="text-sm font-medium text-gray-900">
                            <a href="{{route('product.detail', $product->id)}}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{$product->name}}
                            </a>
                        </h3>
                        <div class="flex flex-1 flex-col justify-end">
                            <p class="text-base font-medium text-gray-900">R {{$product->price}}</p>
                            <a href="{{route('product.detail', $product->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Details</a>

                        </div>
                    </div>
                </div>
                @empty
                    <h3>No Products found</h3>
                    @endforelse



                <!-- More products... -->
            </div>
        </div>
    </div>

@endsection
