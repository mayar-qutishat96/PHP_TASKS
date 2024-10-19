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
$numbers = [1, 5, 9]; // You can change these values to test other inputs

// Function to find the largest number
function findLargest($nums) {
    return max($nums); // Use the max function to find the largest number
}

// Get the largest number
$largestNumber = findLargest($numbers);

// Display the output
echo $largestNumber; // Output the largest number
?>  
</body>
</html>