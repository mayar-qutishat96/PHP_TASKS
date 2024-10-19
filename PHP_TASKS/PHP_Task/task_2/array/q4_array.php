<?php

function generateUniqueRandomNumbers($min, $max, $count) {
    // Check if the range can accommodate the desired number of unique numbers
    if ($max - $min + 1 < $count) {
        return "Range too small for the number of unique numbers requested.";
    }
    
    // Generate an array of numbers within the specified range
    $numbers = range($min, $max);
    
    // Shuffle the array to randomize the order
    shuffle($numbers);
    
    // Slice the first $count elements from the shuffled array
    return array_slice($numbers, 0, $count);
}

// Sample input range
$min = 11;
$max = 20;
$count = 10;

// Generate unique random numbers
$uniqueRandomNumbers = generateUniqueRandomNumbers($min, $max, $count);

// Output the result
echo implode(" ", $uniqueRandomNumbers);
?>