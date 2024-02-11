<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Waste Info System</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4; /* Set your preferred background color */
        }

        header {
            background-color: #333; /* Set your preferred header background color */
            color: #fff; /* Set your preferred text color */
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #444; /* Set your preferred navigation background color */
            color: #fff; /* Set your preferred text color */
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff; /* Set your preferred link color */
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-size: 18px;
        }

        nav a:hover {
            background-color: #555; /* Set your preferred link hover background color */
            border-radius: 5px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff; /* Set your preferred container background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Set your preferred box shadow */
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Waste Info System</h1>
    </header>

    <nav>
        <a href="{{ route('waste.index') }}">Waste Table</a>
        <!-- Add more navigation links here as needed -->
    </nav>

    <div class="container flex justify-center items-center h-screen">
        <!-- Your content goes here -->
        <p>&copy; 2024 Waste Info System. All rights reserved.</p>
    </div>
</body>

</html>
