<p>Dear Admin,</p>

<p>{{ $mail_data['name'] }} has placed a new order. Below are the details:</p>

<ul>
    @foreach($mail_data['products'] as $product)
        <li>
            {{ $product->name }} ({{ $product->quantity }} pcs): {{ $mail_data['symbol'] }}{{ $product->price }} x {{ $product->quantity }} = {{ $mail_data['symbol'] }}{{ $product->total_cost }}
        </li>
    @endforeach
</ul>

<p><strong>Total Amount: {{ $mail_data['symbol'] }}{{ number_format($mail_data['total'], 2) }}</strong></p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>
