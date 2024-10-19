<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $familyname = $_POST['familyname'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dob_day = (int)$_POST['dob_day'];
    $dob_month = (int)$_POST['dob_month'];
    $dob_year = (int)$_POST['dob_year'];

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Validate Mobile
    if (!preg_match('/^\d{14}$/', $mobile)) {
        die("Mobile number must be 14 digits.");
    }

    // Validate Full Name
    if (empty($fname) || empty($lname) || empty($familyname)) {
        die("Full name fields are required.");
    }

    // Validate Password
    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/\d/', $password) || 
        !preg_match('/[@$!%*?&]/', $password) || 
        preg_match('/\s/', $password)) {
        die("Password must be at least 8 characters long and include upper case, lower case, number, special character, and no spaces.");
    }

    // Validate Password Confirmation
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Validate Date of Birth
    $dob = DateTime::createFromFormat('Y-m-d', "{$dob_year}-{$dob_month}-{$dob_day}");
    $age = $dob ? (new DateTime())->diff($dob)->y : 0;

    if ($age < 16) {
        die("You must be at least 16 years old to register.");
    }

    // Store user information in a session
    $_SESSION['user'] = [
        'email' => $email,
        'mobile' => $mobile,
        'fname' => $fname,
        'mname' => $mname,
        'lname' => $lname,
        'familyname' => $familyname,
        'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
        'dob' => $dob->format('Y-m-d')
    ];

    echo "Registration successful! You can now <a href='login.php'>login</a>.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
    body{background:lavender;}
</style>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="signup.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" pattern="\d{14}" required><br>

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br>

        <label for="mname">Middle Name:</label>
        <input type="text" id="mname" name="mname"><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br>

        <label for="familyname">Family Name:</label>
        <input type="text" id="familyname" name="familyname" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <label for="dob_day">Date of Birth (Day):</label>
        <input type="number" id="dob_day" name="dob_day" min="1" max="31" required>
        
        <label for="dob_month">Month:</label>
        <input type="number" id="dob_month" name="dob_month" min="1" max="12" required>
        
        <label for="dob_year">Year:</label>
        <input type="number" id="dob_year" name="dob_year" min="1900" max="2023" required><br>

        <button type="submit">Sign Up</button>
    </form>
</body>
</html>