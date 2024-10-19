<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input arrays
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);

// Merge the arrays
$mergedArray = array_merge($array1, $array2);

// Display the merged array
echo "Array\n(\n";
foreach ($mergedArray as $key => $value) {
    // Check if the key is numeric or not for proper formatting
    if (is_string($key)) {
        echo " [$key] => $value\n";
    } else {
        echo " [$key] => $value\n";
    }
}
echo ")\n";
?> 
</body>
</html>