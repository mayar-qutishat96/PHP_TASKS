<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Initialize an empty array to hold the letters
$letters = [];

// Loop through the ASCII values of lowercase letters
for ($i = ord('a'); $i <= ord('z'); $i++) {
    // Convert ASCII value to character and add to the array
    $letters[] = chr($i);
}

// Join the letters with a space and display the result
echo implode(' ', $letters) . "\n";

?>   
</body>
</html>