<!DOCTYPE html>
<html>
<head>
    <title>New Booking Request</title>
</head>
<body>
    <h1>New Booking Request</h1>
    <p>You have received a new booking request. Below are the details:</p>

    <ul>
        <li><strong>Property Name:</strong> {{ $data['property_name'] }}</li>
        <li><strong>Dates:</strong> {{ $data['dates'] }}</li>
        <li><strong>Number of Guests:</strong> {{ $data['guest_count'] }}</li>
        <li><strong>Total Cost:</strong> {{ $data['total'] }} {{ $data['currency'] }}</li>
        <li><strong>Number of Months:</strong> {{ $data['number_of_days'] }}</li>
        <li><strong>Customer Phone Number:</strong> {{ $data['phone_number'] }}</li>
        <li><strong>Customer Email:</strong> {{ $data['email'] }}</li>
    </ul>
</body>
</html>