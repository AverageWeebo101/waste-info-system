<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Info System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        header img {
            max-width: 100%;
            height: auto;
        }

        nav {
            display: flex;
        }

        nav a {
            margin-right: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .banner {
            margin-top: 20px;
            text-align: center;
        }

        .banner img {
            max-width: 100%;
            height: auto;
        }

        .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px;
        }

        .box {
            width: 300px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .box img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        footer {
            padding: 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <img src="https://cdn.donmai.us/original/40/3d/__tanya_degurechaff_youjo_senki_drawn_by_genya_genya67__403d7345e61e014a8e4bb76481ec172d.png" alt="Placeholder Image" width="203.25" height="66.75">
        <nav>
            <a href="/">Home</a>
            <a href="#">About</a>
            <a href="#">Public Database</a>
            <a href="/login">Admin</a>
            <!-- Navigation links -->
        </nav>
    </header>

    <div class="banner">
        <img src="https://www.interprint-services.co.uk/wp-content/uploads/2019/04/placeholder-banner.png" alt="Banner Image" width="1200" height="200">
    </div>

    <div class="container">
        <div class="box">
            <img src="https://www.clipartmax.com/png/middle/298-2982472_placeholder-anime-things.png" alt="Image 1" width="300" height="200">
            <p>Box 1 Text</p>
        </div>

        <div class="box">
            <img src="https://www.clipartmax.com/png/middle/298-2982472_placeholder-anime-things.png" alt="Image 2" width="300" height="200">
            <p>Box 2 Text</p>
        </div>

        <div class="box">
            <img src="https://www.clipartmax.com/png/middle/298-2982472_placeholder-anime-things.png" alt="Image 3" width="300" height="200">
            <p>Box 3 Text</p>
        </div>

        <!-- Boxes -->
    </div>

    <footer>
        &copy; 2024 Waste Info System. All rights reserved.
    </footer>

</body>
</html>
