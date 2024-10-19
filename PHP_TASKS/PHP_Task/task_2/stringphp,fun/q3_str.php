<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to get the next letter
function getNextLetter($char) {
    // Check if the input is a single letter
    if (strlen($char) !== 1 || !ctype_alpha($char)) {
        return "Invalid input. Please enter a single letter.";
    }

    // Convert the letter to lowercase
    $char = strtolower($char);
    
    // Calculate the next letter
    if ($char === 'z') {
        return 'a'; // Wrap around from 'z' to 'a'
    } else {
        return chr(ord($char) + 1); // Get the next letter
    }
}

// Sample input
$input = 'a';
echo "Sample Character: '{$input}'\n";
echo "Expected Output: '" . getNextLetter($input) . "'\n";

// Test with 'z'
$input = 'z';
echo "Sample Character: '{$input}'\n";
echo "Expected Output: '" . getNextLetter($input) . "'\n";

?>  
</body>
</html>