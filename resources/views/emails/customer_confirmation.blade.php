<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Thank You for Your Booking!</h1>
    <p>Dear Customer,</p>
    <p>Your booking request has been received. Below are the details:</p>

    <ul>
        <li><strong>Property Name:</strong> {{ $data['property_name'] }}</li>
        <li><strong>Dates:</strong> {{ $data['dates'] }}</li>
        <li><strong>Number of Guests:</strong> {{ $data['guest_count'] }}</li>
        <li><strong>Total Cost:</strong> {{ $data['total'] }} {{ $data['currency'] }}</li>
        <li><strong>Number of Months:</strong> {{ $data['number_of_days'] }}</li>
    </ul>

    <p>If you have any questions, feel free to contact us.</p>
    <p>+31 6 86495035</p>

    <p>Best regards,<br>
    Tuza Assets</p>
</body>
</html>