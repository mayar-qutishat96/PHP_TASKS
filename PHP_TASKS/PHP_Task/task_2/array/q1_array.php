<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to convert all strings in the array to lowercase
function convertToLowerCase($array) {
    return array_map('strtolower', $array);
}

// Sample Input
$colors = array("RED", "BLUE", "WHITE", "YELLOW");

// Convert to lowercase
$lowercaseColors = convertToLowerCase($colors);

// Display the result
echo "Array\n(\n";
foreach ($lowercaseColors as $color) {
    echo " $color\n"; // Print each color
}
echo ")\n";

?>   
</body>
</html>