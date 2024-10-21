<form action="{{ route('backend.payment.checkout') }}" method="POST">
    @csrf
    <button type="submit">Checkout</button>
</form>