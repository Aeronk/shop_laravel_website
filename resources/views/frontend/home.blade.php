@extends('layouts.main')

@section('content')


    <div class="bg-white">

        <main>
            <!-- Featured section -->
            <section aria-labelledby="cause-heading">
                <div class="relative bg-gray-800 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                    <div class="absolute inset-0 overflow-hidden">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-feature-section-full-width.jpg" alt="" class="h-full w-full object-cover object-center">
                    </div>
                    <div aria-hidden="true" class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
                    <div class="relative mx-auto flex max-w-3xl flex-col items-center text-center">
                        <h2 id="cause-heading" class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Welcome to our Clothing Shop</h2>
                        <p class="mt-3 text-xl text-white">We're committed to responsible, sustainable, and ethical manufacturing. Our small-scale approach allows us to focus on quality and reduce our impact. We're doing our best to delay the inevitable heat-death of the universe.</p>
                        <a href="#" class="mt-8 block w-full rounded-md border border-transparent bg-white py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">Read our story</a>
                    </div>
                </div>
            </section>
            <!-- Favorites section -->
            <section aria-labelledby="favorites-heading">
                <div class="mx-auto max-w-7xl py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                    <div class="sm:items-baseline text-center">
                        <h2 id="favorites-heading" class="text-2xl font-bold tracking-tight text-gray-900 ">Our Products</h2>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-10 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:gap-x-8">
                        @forelse($products as $product)
                        <div class="group relative">
                            <div class="h-96 w-full overflow-hidden rounded-lg group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-3 sm:h-auto">
                                <img src="{{$product->image_path}}" alt="{{$product->name}}" class="h-full w-full object-cover object-center">
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">
{{--                                <a href="#">--}}
                                    <span class="absolute inset-0"></span>
                                   {{$product->name}}
{{--                                </a>--}}
                            </h3>
                            <p class="mt-1 text-sm text-gray-500"> $ {{$product->price}}</p>
                            <div class="flex space-x-2  py-6 absolute">
                                <div>
                                    <a href="{{route('product.detail', $product->id)}}" class="position inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                        View Details
                                    </a>
                                    <a href="{{route('products.email-reg', $product->id)}}" class="position inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                        Pay
                                    </a>


                                </div>
                            </div>
                        </div>
                            @empty
                            <h4 class="text-center text-center text-gray-500">No Products</h4>

                      @endforelse
                    </div>


                </div>
            </section>

        </main>
    </div>

@endsection

