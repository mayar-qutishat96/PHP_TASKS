<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input variables
$x = 12;
$y = 10;

// Function to swap two variables
function swap(&$a, &$b) {
    $temp = $a; // Store the value of a in a temporary variable
    $a = $b;    // Assign the value of b to a
    $b = $temp; // Assign the value of the temporary variable to b
}

// Swap the variables
swap($x, $y);

// Display the output
echo "x = $x\n";
echo "y = $y\n";
?>  
</body>
</html>