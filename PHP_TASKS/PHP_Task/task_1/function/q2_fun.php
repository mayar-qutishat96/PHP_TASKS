<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input string
$inputString = "remove";

// Function to reverse the string
function reverseString($str) {
    return strrev($str);
}

// Reverse the input string
$reversedString = reverseString($inputString);

// Display the output
echo $reversedString . "\n";
?>  
</body>
</html>