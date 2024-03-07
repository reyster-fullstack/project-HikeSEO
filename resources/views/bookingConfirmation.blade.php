<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Hello {{ $name }},</p>
    <p>Thank you for your booking. Here are your booking details:</p>
    <ul>
        <li>Email: {{ $email }}</li>
        <li>Phone Number: {{ $phone }}</li>
        <li>Vehicle: {{ $vehicle }}</li>
    </ul>
    <p>We look forward to serving you.</p>
</body>
</html>
