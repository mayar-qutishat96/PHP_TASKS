<?php

function printFloydTriangle($n) {
    $num = 1; // Start with the first number
    
    for ($i = 1; $i <= $n; $i++) { // Loop through each line
        for ($j = 1; $j <= $i; $j++) { // Loop through each number in the line
            echo $num . " "; // Print the current number
            $num++; // Increment to the next number
        }
        echo "\n"; // Move to the next line after finishing one row
    }
}

// Define the number of lines for the Floyd triangle
$n = 5; // You can change this value to generate more lines
printFloydTriangle($n);
?>