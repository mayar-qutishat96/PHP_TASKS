<?php
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

    // All validations passed
    echo "Registration successful!";
}
?>