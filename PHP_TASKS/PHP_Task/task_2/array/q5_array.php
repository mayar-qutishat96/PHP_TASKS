<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to find the lowest non-zero integer in the array
function lowestNonZeroInteger($array) {
    // Filter out zero values
    $filteredArray = array_filter($array, function($value) {
        return $value !== 0;
    });

    // Return the minimum value from the filtered array, or null if no non-zero values
    return !empty($filteredArray) ? min($filteredArray) : null;
}

// Sample Input
$array1 = array(2, 0, 10, 12, 6);

// Get the lowest non-zero integer
$lowest = lowestNonZeroInteger($array1);

// Display the result
if ($lowest !== null) {
    echo " {$lowest}\n";
} else {
    echo "There are no non-zero integers in the array.\n";
}

?>   
</body>
</html>