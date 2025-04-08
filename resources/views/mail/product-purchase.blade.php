<p>Dear {{ $mail_data['name'] }},</p>

<p>Thank you for your purchase. Your order has been confirmed.</p>

<ul>
    @foreach($mail_data['products'] as $product)
        <li>
            {{ $product->name }} ({{ $product->quantity }} pcs) - 
            {{ $mail_data['symbol'] }}{{ number_format($product->price, 2) }} x {{ $product->quantity }} = 
            {{ $mail_data['symbol'] }}{{ number_format($product->total, 2) }}
        </li>
    @endforeach
</ul>

<p><strong>Total Amount: {{ $mail_data['symbol'] }}{{ number_format($mail_data['total'], 2) }}</strong></p>

<p>We will ship your order as soon as possible.</p>

<p>Happy exploring!</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>