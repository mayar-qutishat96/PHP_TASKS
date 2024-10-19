<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Loop through numbers from 1 to 50
for ($i = 1; $i <= 50; $i++) {
    // Check if the number is a multiple of both 3 and 5
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz ";
    }
    // Check if the number is a multiple of 3
    elseif ($i % 3 == 0) {
        echo "Fizz ";
    }
    // Check if the number is a multiple of 5
    elseif ($i % 5 == 0) {
        echo "Buzz ";
    }
    // If not a multiple of either, print the number itself
    else {
        echo "{$i} ";
    }
}

echo "\n"; // New line at the end

?>   
</body>
</html>