<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to generate a random password from a given string
function generateRandomPassword($inputString, $length = 8) {
    $password = '';
    $stringLength = strlen($inputString);
    
    // Generate random characters from the input string
    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $stringLength - 1); // Use mt_rand for random index
        $password .= $inputString[$index]; // Append random character to password
    }
    
    return $password;
}

// Example usage
$inputString = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
$passwordLength = 8; // You can change the length as needed
$randomPassword = generateRandomPassword($inputString, $passwordLength);

// Display result
echo "Random Password: '$randomPassword'\n"; // Display the generated password
?>  
</body>
</html>