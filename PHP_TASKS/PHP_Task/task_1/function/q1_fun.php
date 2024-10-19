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
$number = 3; // You can change this to test other numbers

// Function to check if a number is prime
function isPrime($num) {
    // Check for numbers less than 2
    if ($num < 2) {
        return false;
    }
    // Check for factors from 2 to the square root of the number
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false; // Not a prime number
        }
    }
    return true; // Is a prime number
}

// Check if the number is prime and display the result
if (isPrime($number)) {
    echo "$number is a prime number\n";
} else {
    echo "$number is not a prime number\n";
}
?> 
</body>
</html>