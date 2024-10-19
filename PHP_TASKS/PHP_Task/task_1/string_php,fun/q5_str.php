<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to extract the username from an email address
function getUsernameFromEmail($email) {
    // Use explode to split the email by the "@" character
    $parts = explode('@', $email);
    
    // Return the username part (the first part of the array)
    return $parts[0];
}

// Example usage
$inputEmail = 'info@orange.com';
$username = getUsernameFromEmail($inputEmail);

// Display result
echo " '$username'\n"; // Display the username
?>   
</body>
</html>