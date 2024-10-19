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
$number = 407;

// Function to check if a number is an Armstrong number
function isArmstrong($num) {
    // Convert the number to a string to access its digits
    $digits = str_split($num);
    $sum = 0;

    // Calculate the sum of the cubes of its digits
    foreach ($digits as $digit) {
        $sum += pow($digit, 3);
    }

    // Check if the sum is equal to the original number
    return $sum === $num;
}

// Check if the number is an Armstrong number and display the result
if (isArmstrong($number)) {
    echo "$number is an Armstrong Number\n"; // Display output if it is Armstrong
} else {
    echo "$number is not an Armstrong Number\n"; // Display output if it is not
}
?>   
</body>
</html>