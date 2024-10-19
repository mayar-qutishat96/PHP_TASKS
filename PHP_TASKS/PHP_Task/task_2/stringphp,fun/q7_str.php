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
$originalString = 'The quick brown fox jumps over the lazy dog---';

// Remove trailing dashes using rtrim()
$modifiedString = rtrim($originalString, '-');

// Display the result
echo "'{$modifiedString}'\n";

?>   
</body>
</html>