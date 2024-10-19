<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input array
$array = array(1, 2, 3, 4, 5);

// Define the location and new item
$location = 3; // Position where we want to insert the new item (0-based index)
$newItem = '$';

// Insert the new item into the array
array_splice($array, $location, 0, $newItem);

// Display the modified array
echo implode(" ", $array) . "\n";
?>
</body>
</html>