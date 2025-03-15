<p>Dear {{ $mail_data['name'] }},</p>

<p>Thank you for your purchase. Your order has been confirmed.
    <ul>
        @foreach($mail_data['products'] as $product)
            <li>{{ $product->name }} - {{ $product->price }} {{ $product->currency }}</li>
        @endforeach
    </ul>
<p>You can start your learning journey now.</p>

<p>Happy exploring!</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>