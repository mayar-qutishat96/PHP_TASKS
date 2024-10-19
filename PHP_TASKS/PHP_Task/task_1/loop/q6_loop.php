<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input
$number = 5;

// Initialize factorial variable
$factorial = 1;

// Calculate factorial using a for loop
for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}

// Print the result
echo $factorial;
?>  
</body>
</html>