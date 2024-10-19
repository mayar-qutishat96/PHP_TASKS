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
$originalString = '0000657022.24';

// Remove leading zeroes using ltrim()
$cleanedString = ltrim($originalString, '0');

// If the result is an empty string (in case of '0000' or similar), return '0'
if ($cleanedString === '') {
    $cleanedString = '0';
}

// Display the result
echo " '{$cleanedString}'\n";

?>   
</body>
</html>