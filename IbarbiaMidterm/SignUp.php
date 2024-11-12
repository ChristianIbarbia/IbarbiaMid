<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address']; // Collect address
    // Check if the email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already taken!');</script>";
    } else {
        // Hash the password before saving it to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, address) VALUES ( ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $email, $hashed_password, $first_name, $last_name, $address);

        if ($stmt->execute()) {
            echo "<script>alert('Sign up successful!'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INSTAFLEX</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: url('https://wallpapers.com/images/hd/aesthetic-pink-abstract-5dwmbb6hqikpvpr5.jpg') no-repeat center center fixed;
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .container {
                background: #000000;
                padding: 30px;
                border-radius: 8px;
                width: 500px; /* Increased width to 500px */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            /* Instagram logo styling */
            .instagram-logo {
                width: 100px; /* Set logo size */
                height: auto;
                margin-bottom: 20px; /* Adds space below the logo */
            }

            h2 {
                color: #444;
                margin-bottom: 15px;
            }

            input[type="email"], input[type="password"], input[type="text"], input[type="tel"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border-radius: 5px;
                border: 1px solid #ddd;
                font-size: 14px;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                margin-top: 10px;
            }

            .switch-link {
                color: #4CAF50;
                cursor: pointer;
                margin-top: 10px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Instagram-style logo -->
            <img src="https://img.freepik.com/premium-photo/instagram-design_1115474-1275.jpg" alt="Instagram Logo" class="instagram-logo">
            
            <h2>INSTAFLEX</h2>
            <form action="signup.php" method="post">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="address" placeholder="Address" required> 
                <button type="submit" name="signup">Sign Up</button>
            </form>
            <p class="switch-link">Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </body>
</html>
