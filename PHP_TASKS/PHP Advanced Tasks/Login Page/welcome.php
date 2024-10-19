<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
    body{background:lavender;}
</style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['fname']); ?>!</h1>
    <p>Your email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Your mobile: <?php echo htmlspecialchars($user['mobile']); ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>