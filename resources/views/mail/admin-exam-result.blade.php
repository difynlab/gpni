<p>Dear Admin,</p>

<p>{{ $mail_data['name'] }} has completed their {{ $mail_data['type'] }} exam of {{ $mail_data['course_name'] }}.</p>

<p><strong>Below are the results:</strong></p>

<p>Total Questions: {{ $mail_data['total_questions'] }}</p>

<p>Total Correct Answers: {{ $mail_data['total_correct_answers'] }}</p>

<p>Marks: {{ number_format($mail_data['marks'], 2) }}</p>

<p>Result: {{ $mail_data['result'] }}</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>