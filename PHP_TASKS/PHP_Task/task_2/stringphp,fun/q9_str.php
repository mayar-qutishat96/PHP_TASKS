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

// Split the string into words
$words = explode(' ', $originalString);

// Get the first 5 words
$firstFiveWords = array_slice($words, 0, 5);

// Join the first 5 words back into a string
$modifiedString = implode(' ', $firstFiveWords);

// Display the result
echo "'{$modifiedString}'\n";

?>  
</body>
</html>