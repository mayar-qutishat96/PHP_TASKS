<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Loop through numbers from 200 to 250
for ($i = 200; $i <= 250; $i++) {
    // Check if the number is divisible by 4
    if ($i % 4 === 0) {
        echo $i . "\n"; // Print the number
    }
}

?> 
</body>
</html>