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
$fruits = array(
    "d" => "lemon",
    "a" => "orange",
    "b" => "banana",
    "c" => "apple"
);

// Sort the array by keys in ascending order
ksort($fruits);

// Display the sorted array
foreach ($fruits as $key => $value) {
    echo "$key = $value\n";
}
?>
</body>
</html>