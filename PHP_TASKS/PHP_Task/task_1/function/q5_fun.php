<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input
$inputString = "Eva, can I see bees in a cave?";

// Function to check if a string is a palindrome
function isPalindrome($str) {
    // Remove non-alphanumeric characters and convert to lowercase
    $cleanedString = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
    
    // Reverse the cleaned string
    $reversedString = strrev($cleanedString);
    
    // Check if the cleaned string is equal to its reverse
    return $cleanedString === $reversedString;
}

// Check if the input string is a palindrome and display the result
if (isPalindrome($inputString)) {
    echo "Yes, it is a palindrome\n"; // Display output if it is a palindrome
} else {
    echo "No, it is not a palindrome\n"; // Display output if it is not
}
?>   
</body>
</html>