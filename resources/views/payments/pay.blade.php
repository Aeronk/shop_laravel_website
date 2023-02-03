@extends('layouts.main')

@section('title')  Pay @endsection

@section('content')

    <div class="bg-white">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-full my-6 pr-0 lg:pr-2">
                <div class="leading-loose text-center">

                    <!-- products/pay.blade.php -->
                    <form action="{{ route('products.charge',$order->id)}}" method="post" style="margin: auto; width: 50%;">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ config('services.stripe.key') }}"
                            data-amount="{{$order->product->price * 100 }}"
                            data-name="{{ $order->product->name }}"
                            data-description="Buy {{ $order->product->name }}"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="usd">
                        </script>
                    </form>
                </div>

            </div>
        </div>
    </div>

 @endsection
