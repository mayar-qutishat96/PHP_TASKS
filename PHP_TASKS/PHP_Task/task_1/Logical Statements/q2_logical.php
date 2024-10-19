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
$number = 20; // You can change this to test other numbers

// Function to check if a number is a multiple of 3
function isMultipleOfThree($num) {
    // Check if the number is positive
    if ($num > 0) {
        return $num % 3 === 0; // Return true if it's a multiple of 3
    }
    return false; // Return false for non-positive numbers
}

// Check if the number is a multiple of 3 and display the result
$result = isMultipleOfThree($number);
echo $result ? "'true'" : "'false'"; // Output 'true' or 'false' with quotes
?>  
</body>
</html>