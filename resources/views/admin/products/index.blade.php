@extends('layouts.admin')
@section('title') Products List @endsection

@section('content')

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
             Products Table
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Product
                    </th>

                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Price
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full"
                                     src="{{$product->image}}"
                                     alt="{{$product->image}}" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                   {{$product->name}}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$product->price}}</p>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                        <a href="{{route('products.edit', $product->id)}}" class="btn">Edit</a>
                        <a href="{{route('products.destroy', $product->id)}}" class="btn">Delete</a>

                    </td>
                </tr>
                    @empty
                @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection
