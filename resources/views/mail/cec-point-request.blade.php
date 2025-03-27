<p>Dear Admin,</p>

<p>{{ $mail_data['name'] }} ({{ $mail_data['email'] }}) has requested {{ $mail_data['points'] }} CEC points for {{ $mail_data['course'] ?? $mail_data['activity_name'] }}</strong>.</p>

<p>Comment: {{ $mail_data['user_comment'] }}</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>