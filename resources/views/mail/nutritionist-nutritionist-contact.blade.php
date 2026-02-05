<p>Dear {{ $mail_data['nutritionist']['first_name'] }} {{ $mail_data['nutritionist']['last_name'] }},</p>

<p>A user has been contacted you through the nutritionist contact feature.</p>

<p><strong>User Details:</strong></p>
<p><strong>Email:</strong> {{ $mail_data['request']['email'] }}</p>
<p><strong>Phone Number:</strong> {{ $mail_data['request']['phone_number'] }}</p>
<p><strong>App:</strong> {{ $mail_data['request']['app'] }}</p>
<p><strong>App ID:</strong> {{ $mail_data['request']['app_id'] }}</p>
<p><strong>City:</strong> {{ $mail_data['request']['city'] }}</p>
<p><strong>Country:</strong> {{ $mail_data['request']['country'] }}</p>

<p>Please review and respond to this user.</p>

<p style="margin-top: 15px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>