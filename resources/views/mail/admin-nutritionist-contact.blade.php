<p>Dear Admin,</p>

<p>A coach has been contacted by a user through the nutritionist contact feature.</p>

<p><strong>User Details:</strong></p>
<p><strong>Email:</strong> {{ $mail_data['request']['email'] }}</p>
<p><strong>Phone Number:</strong> {{ $mail_data['request']['phone_number'] }}</p>
<p><strong>App:</strong> {{ $mail_data['request']['app'] }}</p>
<p><strong>App ID:</strong> {{ $mail_data['request']['app_id'] }}</p>
<p><strong>City:</strong> {{ $mail_data['request']['city'] }}</p>
<p><strong>Country:</strong> {{ $mail_data['request']['country'] }}</p>

<br><br>

<p><strong>Coach Details:</strong></p>
<p><strong>Name:</strong> {{ $mail_data['nutritionist']['first_name'] }} {{ $mail_data['nutritionist']['last_name'] }}</p>
<p><strong>Email:</strong> {{ $mail_data['nutritionist']['email'] }}</p>
<p><strong>Country:</strong> {{ $mail_data['nutritionist']['country'] }}</p>

<p style="margin-top: 15px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>