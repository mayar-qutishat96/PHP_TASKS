<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Number of Fibonacci numbers to generate
$n = 10;

// Initialize the first two Fibonacci numbers
$fibonacci = [0, 1];

// Generate the Fibonacci sequence
for ($i = 2; $i < $n; $i++) {
    // Next Fibonacci number is the sum of the last two
    $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
}

// Display the Fibonacci sequence
echo implode(', ', $fibonacci) . "\n";

?>  
</body>
</html>