<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Original string
$originalString = '\"\1+2/3*2:2-3/4*3';

// Remove special characters using preg_replace
$modifiedString = preg_replace('/[^0-9]+/', ' ', $originalString);

// Trim any extra spaces from the result
$modifiedString = trim($modifiedString);

// Display the result
echo "'{$modifiedString}'\n";

?>   
</body>
</html>