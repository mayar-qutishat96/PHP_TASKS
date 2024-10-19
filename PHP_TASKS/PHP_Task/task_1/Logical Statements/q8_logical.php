<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to check the number
function checkNumber($number) {
    if ($number > 0) {
        return 'Positive';
    } elseif ($number < 0) {
        return 'Negative';
    } else {
        return 'Zero';
    }
}

// Sample input
$number = -60;

// Check the number
$result = checkNumber($number);

// Output the result with the specified format
echo "'$result'";
?> 
</body>
</html>