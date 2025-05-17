<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Receipt</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.5;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .details {
            margin: 0 auto;
            width: 80%;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>🚗 Car Rental Booking Receipt</h2>
        <p><strong>Rental ID:</strong> {{ $booking->id }}</p>
        <p>Date: {{ now()->format('d M Y') }}</p>
    </div>

    <div class="details">
        <div class="section">
            <h3>Customer Info</h3>
            <p><strong>Name:</strong> {{ $rental->user->name }}</p>
            <p><strong>Email:</strong> {{ $rental->user->email }}</p>
        </div>

        <div class="section">
            <h3>Rental Details</h3>
            <p><strong>Car:</strong> {{ $rental->car->name }}</p>
            <p><strong>Pickup Date:</strong> {{ $rental->start_date }}</p>
            <p><strong>Return Date:</strong> {{ $rental->end_date }}</p>
            <p><strong>Total Days:</strong> {{ $rental->total_days }}</p>
        </div>

        <div class="section">
            <h3>Payment</h3>
            <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>
        </div>
    </div>
</body>

</html>