<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body{background:lavender;}
</style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Login</h2>
        <form id="loginForm" method="POST" action="login.php">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input on the server side
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    // If no errors, proceed to check credentials in the database
    if (empty($errors)) {
        // Query to get the user data
        // $sql = "SELECT * FROM users WHERE email = ?";
        // Execute the query with your database connection.

        // Assume $user contains the fetched user data
        // if (password_verify($password, $user['password'])) {
        //     // Start the session and set user info
        //     session_start();
        //     $_SESSION['user_id'] = $user['id'];
        //     echo "<div class='alert alert-success'>Login successful!</div>";
        // } else {
        //     echo "<div class='alert alert-danger'>Invalid credentials</div>";
        // }

        echo "<div class='alert alert-success'>Login successful!</div>"; // Placeholder for successful login
    } else {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}
?>


    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                alert("Invalid email");
                return;
            }

            this.submit(); // If valid, submit the form
        });
    </script>
</body>
</html>