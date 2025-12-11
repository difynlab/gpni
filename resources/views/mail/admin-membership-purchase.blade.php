<p>Dear Admin,</p>

<p>{{ $mail_data['name'] }} has successfully purchased the <strong>{{ $mail_data['member_type'] }}</strong> membership.</p>

@if($mail_data['member_type'] == 'Annual')
    <p>The membership expiry date is {{ $mail_data['member_annual_expiry_date'] }}.</p>
@endif

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>