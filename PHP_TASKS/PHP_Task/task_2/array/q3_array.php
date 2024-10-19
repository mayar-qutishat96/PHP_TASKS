<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Sample Input
$words = array("abcd", "abc", "de", "hjjj", "g", "wer");

// Initialize variables to hold the shortest and longest lengths
$shortestLength = PHP_INT_MAX; // Start with the maximum possible integer
$longestLength = 0; // Start with zero

// Loop through each word in the array
foreach ($words as $word) {
    $length = strlen($word); // Get the length of the current word
    
    // Update shortest length if the current word is shorter
    if ($length < $shortestLength) {
        $shortestLength = $length;
    }
    
    // Update longest length if the current word is longer
    if ($length > $longestLength) {
        $longestLength = $length;
    }
}

// Display the results
echo "The shortest array length is {$shortestLength}. The longest array length is {$longestLength}.\n";

?>  
</body>
</html>