<p>Dear {{ $mail_data['name'] }},</p>

<p>Thank you for your purchase. Your order has been confirmed.</p>

<ul>
    @foreach($mail_data['products'] as $product)
        <li>{{ $product->name }}: {{ $mail_data['symbol'] }} {{ $product->price }}</li>
    @endforeach
</ul>

<p>We will ship your order as soon as possible.</p>

<p>Happy exploring!</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>