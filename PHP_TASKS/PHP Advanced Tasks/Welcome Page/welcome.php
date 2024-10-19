<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Get user information from the session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<style>
    body{background:lavender;}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['fname']); ?>!</h1>
    <p>Your email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Thank you for joining us. We're glad to have you here!</p>
    <a href="logout.php">Logout</a>
</body>
</html>