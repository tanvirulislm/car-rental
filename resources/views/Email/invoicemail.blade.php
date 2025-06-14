<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Your Booking Confirmation - Mercedes-Benz E-Class</title>
    <style>
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eaeaea;
        }

        .logo {
            max-height: 50px;
        }

        .confirmation-badge {
            background-color: #10b981;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .car-image {
            width: 100%;
            border-radius: 8px;
            margin: 15px 0;
        }

        .details-box {
            background: #f9fafb;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .divider {
            border-top: 1px solid #eaeaea;
            margin: 20px 0;
        }

        .button {
            background-color: #3b82f6;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            font-weight: bold;
        }

        .footer {
            font-size: 12px;
            color: #6b7280;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ asset('logo.png') }}" alt="Rimberio" class="h-18" />
    </div>

    <h1>Your booking is confirmed!</h1>

    <p>Hello {{ $rental->user->name ?? 'Customer' }},</p>
    <p>
        Thank you for choosing us for your car rental needs. Below are the
        details of your reservation:
    </p>

    <img src="{{ $rental->car->image_url ?? 'https://via.placeholder.com/600x300' }}" alt="Mercedes-Benz E-Class"
        class="car-image" />

    <h2>{{ $rental->car->name ?? 'Car Model' }} ({{ $rental->car->year ?? 'Year' }})</h2>
    <p>{{ $rental->car->brand ?? 'Brand' }} . {{ $rental->car->car_type ?? 'Car Type' }}</p>

    <div class="details-box">
        <div class="detail-row">
            <span><strong>Pick-Up Location:</strong></span>
            <span>Downtown Rental Center<br />123 Main St, Cityville</span>
        </div>
        <div class="detail-row">
            <span><strong>Pick-Up Date & Time:</strong></span>
            <span>{{ $rental->start_date->format('l, M d, Y \a\t h:i A') }}</span>
        </div>
        <div class="detail-row">
            <span><strong>Return Date & Time:</strong></span>
            <span>{{ $rental->end_date->format('l, M d, Y \a\t h:i A') }}</span>
        </div>
        <div class="detail-row">
            <span><strong>Rental Duration:</strong></span>
            <span>3 days</span>
        </div>
    </div>

    <h3>Price Summary</h3>
    <div class="detail-row">
        <span>Base Rate ({{ $rental->start_date->diffInDays($rental->end_date) }} days ×
            ${{ number_format($rental->car->daily_rate, 2) }}):</span>
        <span>${{ number_format($rental->total_cost, 2) }}</span>
    </div>

    <div class="divider"></div>

    <div class="detail-row" style="font-weight: bold; font-size: 1.1em">
        <span>Total Amount Paid:</span>
        <span>${{ number_format($rental->total_cost, 2) }}</span>
    </div>

    <h3>What to Bring to Pick-Up</h3>
    <ul>
        <li>Your driver's license</li>
        <li>The credit card used for booking</li>
        <li>This confirmation email (digital or printed)</li>
    </ul>

    <div style="text-align: center; margin: 25px 0">
        <a href="#" class="button">Download Receipt</a>
    </div>

    <div class="divider"></div>

    <h3>Need to make changes?</h3>
    <p>
        You can modify or cancel your booking by visiting
        <a href="#">My Reservations</a> or calling our customer service at
        (555) 123-4567.
    </p>

    <p>We look forward to serving you!</p>
    <p><strong>The [Your Rental Company] Team</strong></p>

    <div class="footer">
        <p>© 2023 Your Rental Company. All rights reserved.</p>
        <p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |
            <a href="#">Contact Us</a>
        </p>
        <p>
            [Your Company Address]<br />
            City, State ZIP Code
        </p>
    </div>
</body>

</html>