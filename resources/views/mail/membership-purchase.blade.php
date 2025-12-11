<p>Dear {{ $mail_data['name'] }},</p>

<p>Congratulations! You have successfully purchased the <strong>{{ $mail_data['member_type'] }}</strong> membership.</p>

@if($mail_data['member_type'] == 'Annual')
    <p>Your membership expiry date is {{ $mail_data['member_annual_expiry_date'] }}.</p>
@endif

<p>You can start your learning journey now.</p>

<p>Happy exploring!</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>