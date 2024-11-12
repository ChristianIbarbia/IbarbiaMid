<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: SignIn.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Dashboard</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
             background: url('https://wallpapers.com/images/hd/aesthetic-pink-abstract-5dwmbb6hqikpvpr5.jpg') no-repeat center center fixed;
    background-size: cover;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            width: 350px; /* Adjust for Instagram-style width */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }

        a {
            font-size: 1.1rem;
            color: #0095f6; /* Instagram blue */
            text-decoration: none;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .instagram-logo {
            display: block;
            margin: 0 auto 30px;
            width: 120px;
            height: auto;
        }

        .logout-btn {
            background-color: #f0f0f0;
            color: #0095f6;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            width: 100%;
            margin-top: 10px;
        }

        .logout-btn:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Instagram-style logo -->
        <img src="https://img.freepik.com/premium-photo/instagram-design_1115474-1275.jpg" alt="Instagram Logo" class="instagram-logo">
        
        <h2>Welcome to Instaflex!</h2>
        <p>Hello! <?php echo $_SESSION['user']; ?></p>

        <!-- Logout button -->
        <form action="Logout.php" method="post">
            <button type="submit" class="logout-btn">Log Out</button>
        </form>
    </div>
</body>
</html>
