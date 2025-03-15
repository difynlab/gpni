<p>Dear {{ $mail_data['name'] }},</p>

<p>We are pleased to inform you that your final exam results are available.</p>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Course</th>
        <th>Marks</th>
    </tr>
    <tr>
        <td>Course 1</td>
        <td>{{ $result['course1'] }}</td>
    </tr>
    <tr>
        <td>Course 2</td>
        <td>{{ $result['course2'] }}</td>
    </tr>
    <tr>
        <td>Course 3</td>
        <td>{{ $result['course3'] }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <th>{{ $result['total'] }}</th>
    </tr>
    <tr>
        <th>Status</th>
        <th>{{ $result['status'] }}</th>
    </tr>
</table>

<p>Thank you for your hard work and dedication.</p>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>
