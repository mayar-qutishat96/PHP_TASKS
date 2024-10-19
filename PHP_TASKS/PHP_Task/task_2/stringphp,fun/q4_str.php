<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Original string for insertion
$originalString = 'The brown fox';

// String to insert
$insertString = 'quick';

// Position to insert (after 'The', which ends at index 3)
$position = 4; // Index after 'The'

// Insert the string at the specified position
$newString = substr($originalString, 0, $position) . ' ' . $insertString . substr($originalString, $position);

// Display the result of insertion
echo "Expected Output: '{$newString}'\n";

// Original string for getting the first word
$originalString = 'The quick brown fox';

// Get the first word
$firstWord = strtok($originalString, ' ');

// Display the result of getting the first word
echo "Expected Output: '{$firstWord}'\n";

?>   
</body>
</html>