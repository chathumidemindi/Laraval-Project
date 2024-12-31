<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Scheduling System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .hero {
            background-image: url('tech_driven_bus_schedule_optimization.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .hero p {
            font-size: 1.2rem;
        }
        .hero a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            background-color: #f1f1f1;
            color: #333;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bus Scheduling System</h1>
    </div>
    <div class="hero">
        <h1>Plan Your Journey with Ease</h1>
        <p>Find schedules, book tickets, and manage your trips easily.</p>
        <a href="{{ route('register') }}">View Bus Schedules</a>

    </div>
    <div class="footer">
        <p>&copy; 2024 Bus Scheduling System. All rights reserved.</p>
        <p>Contact us: support@bussystem.com</p>
    </div>
</body>
</html>
