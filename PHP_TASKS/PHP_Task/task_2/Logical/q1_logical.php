<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to check if a year is a leap year
function isLeapYear($year) {
    // A year is a leap year if it is divisible by 4,
    // but not divisible by 100, unless it is also divisible by 400
    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
        return true; // It is a leap year
    } else {
        return false; // It is not a leap year
    }
}

// Sample Input
$year = 2013;

// Check if the specified year is a leap year
if (isLeapYear($year)) {
    echo "This year is a leap year\n";
} else {
    echo "This year is not a leap year\n";
}

?>  
</body>
</html>