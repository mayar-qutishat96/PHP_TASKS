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
$number = 50; // You can change this to test other numbers

// Function to check if the number is in the range [20-50]
function isInRange($num) {
    return $num >= 20 && $num <= 50; // Return true if within range
}

// Check if the number is in the specified range and display the result
$result = isInRange($number);
echo $result ? "'true'" : "'false'"; // Output 'true' or 'false' with quotes
?>  
</body>
</html>