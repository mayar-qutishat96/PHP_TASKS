<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to print the pattern
function printPattern($n) {
    // Ascending part
    for ($i = 0; $i < $n; $i++) {
        // Print leading spaces
        echo str_repeat(" ", ($n - $i - 1) * 2);
        
        // Print letters
        for ($j = 0; $j <= $i; $j++) {
            echo chr(65 + $j) . " "; // chr(65) is 'A'
        }
        
        echo "\n"; // New line after each row
    }

    // Descending part
    for ($i = $n - 2; $i >= 0; $i--) {
        // Print leading spaces
        echo str_repeat(" ", ($n - $i - 1) * 2);
        
        // Print letters
        for ($j = 0; $j <= $i; $j++) {
            echo chr(65 + $j) . " "; // chr(65) is 'A'
        }
        
        echo "\n"; // New line after each row
    }
}

// Set the number of lines for the top half
$n = 5;

// Print the pattern
printPattern($n);

?>   
</body>
</html>