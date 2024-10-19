<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to convert array strings to uppercase
function convertToUpperCase($array) {
    // Use array_map to apply strtoupper to each element
    $upperCaseArray = array_map('strtoupper', $array);
    
    // Display the resulting array
    echo "Array\n(\n";
    foreach ($upperCaseArray as $value) {
        echo " [$value]\n";
    }
    echo ")\n";
}

// Sample input
$colors = array("red", "blue", "white", "yellow");

// Call the function with the sample input
convertToUpperCase($colors);
?>  
</body>
</html>