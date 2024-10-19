<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body{background:lavender;}
</style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Sign Up</h2>
        <form id="signupForm" method="POST" action="signup.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
                <div class="form-text">Username should be 3-15 characters long and contain only letters and numbers.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="form-text">Password should be at least 8 characters long and include a number and a special character.</div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button">Sign Up</button>
</div>
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input on the server side
    $errors = [];

    if (!preg_match('/^[a-zA-Z0-9]{3,15}$/', $username)) {
        $errors[] = "Invalid username";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }
    if (!preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/', $password)) {
        $errors[] = "Invalid password";
    }

    // If no errors, proceed to save to the database
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Here you would typically insert the user into the database.
        // $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        // Execute the query with your database connection.

        echo "<div class='alert alert-success'>Sign Up successful!</div>";
    } else {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}
?>




    <script>
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const usernameRegex = /^[a-zA-Z0-9]{3,15}$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

            if (!usernameRegex.test(username)) {
                alert("Invalid username");
                return;
            }
            if (!emailRegex.test(email)) {
                alert("Invalid email");
                return;
            }
            if (!passwordRegex.test(password)) {
                alert("Invalid password");
                return;
            }

            this.submit(); // If all validations pass, submit the form
        });
    </script>
</body>
</html>