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
$originalString = 'The quick brown fox jumps over the lazy dog';

// String to remove
$removeString = 'fox';

// Remove the specified part of the string
$modifiedString = str_replace($removeString, '', $originalString);

// Optionally, trim any extra spaces
$modifiedString = trim($modifiedString);

// Display the result
echo "'{$modifiedString}'\n";

?>  
</body>
</html>