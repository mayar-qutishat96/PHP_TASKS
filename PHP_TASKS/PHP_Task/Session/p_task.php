<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SESSION["users"])) {
            $_SESSION['users'] = [];
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $newUser = [
            "name" => $name,
            "email" => $email,
            "password" => $password,
        ];
        $_SESSION["users"][] = $newUser;
    }
    ?>
    
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <button type="submit">Submit</button>
    </form>
    
    <a href="p2_task.php">View Users</a> <!-- Link to the display page -->
</body>
</html>