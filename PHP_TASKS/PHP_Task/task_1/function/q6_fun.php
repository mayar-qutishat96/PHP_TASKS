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
$array1 = array(2, 4, 7, 4, 8, 4);

// Function to remove duplicates from an array
function removeDuplicates($array) {
    return array_unique($array); // Use array_unique to remove duplicates
}

// Remove duplicates from the array
$array1 = removeDuplicates($array1);

// Display the output
echo "array1 = array(" . implode(", ", $array1) . ");\n";
?>  
</body>
</html>