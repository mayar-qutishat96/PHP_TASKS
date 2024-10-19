<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to calculate the average and determine the grade
function calculateGrade($scores) {
    // Calculate the average
    $average = array_sum($scores) / count($scores);
    
    // Determine the grade based on the average
    if ($average >= 90) {
        return 'A';
    } elseif ($average >= 80) {
        return 'B';
    } elseif ($average >= 70) {
        return 'C';
    } elseif ($average >= 60) {
        return 'D';
    } else {
        return 'F';
    }
}

// Sample input
$scores = [60, 86, 95, 63, 55, 74, 79, 62, 50];

// Calculate grade
$grade = calculateGrade($scores);

// Output the result with the specified format
echo "'$grade'";
?> 
</body>
</html>