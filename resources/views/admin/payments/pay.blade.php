<!-- products/pay.blade.php -->
<form action="{{ route('products.charge', $product->id) }}" method="post">
    @csrf
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ config('stripe.key') }}"
        data-amount="{{ $product->price * 100 }}"
        data-name="{{ $product->name }}"
        data-description="Buy {{ $product->name }}"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="usd">
    </script>
</form>
