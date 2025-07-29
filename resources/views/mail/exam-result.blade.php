<p>Dear {{ $mail_data['name'] }},</p>

<p>This is your {{ $mail_data['type'] }} exam result of {{ $mail_data['course_name'] }}.</p>

<p>Total Questions: {{ $mail_data['total_questions'] }}</p>

<p>Total Correct Answers: {{ $mail_data['total_correct_answers'] }}</p>

<p>Marks: {{ number_format($mail_data['marks'], 2) }}</p>

<p>Result: {{ $mail_data['result'] }}</p>

<p>Thank you for your hard work and dedication.</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>
