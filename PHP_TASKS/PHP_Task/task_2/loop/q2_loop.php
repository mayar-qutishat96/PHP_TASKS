<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Input string
$text = "Orange Coding Academy";

// Convert the string to lowercase to make the count case-insensitive
$textLower = strtolower($text);

// Count the occurrences of 'c'
$countC = substr_count($textLower, 'c');

// Display the result
echo " {$countC}\n";

?>  
</body>
</html>