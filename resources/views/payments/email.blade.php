@extends('layouts.main')

@section('title')  Enter Email Address @endsection

@section('content')

    <div class="bg-white">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-full my-6 pr-0 lg:pr-2">
                <div class="leading-loose text-center">

                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-center">

                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Enter your email address to proceed</h3>
                        <form method="post" action="{{route('order.save')}}" class="m-auto w-1/2 py-6"  >
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required="">
                            </div>
                            @error('email')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="w-1/2 mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Proceed</button>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
