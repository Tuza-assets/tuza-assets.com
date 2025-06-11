<!-- resources/views/emails/thank_you.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Scheduling a Visit</title>
    <style>
        /* Inline Bootstrap-like styles for email compatibility */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            max-width: 200px;
            height: auto;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            color: #666666;
            line-height: 1.5;
        }
        .content p strong {
            color: #333333;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #999999;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/images/Logo-nobg.png') }}" alt="Tuza Assets Logo">
        </div>
        <div class="content">
            <h1>Thank You for Scheduling a Visit</h1>
            <p>Dear {{ $name }},</p>
            <p>Thank you for requesting a visit to our property. Here are the details of your request:</p>
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Preferred Visit Date:</strong> {{ $date }}</p>
            <p><strong>Property Code:</strong> {{ $property_code }}</p>
            <p>We will get in touch with you soon to confirm your visit.</p>
            <p>Contact: +31 6 86495035</p>
            <p>Best regards,</p>
            <p>Tuza Assets Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Tuza Assets. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
