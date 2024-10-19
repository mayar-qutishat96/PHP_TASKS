<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to calculate the sum or triple sum
function calculateSum($firstInteger, $secondInteger) {
    if ($firstInteger === $secondInteger) {
        $sum = ($firstInteger + $secondInteger) * 3;
        return "({$firstInteger} + {$secondInteger}) * 3 = {$sum}";
    } else {
        $sum = $firstInteger + $secondInteger;
        return "{$firstInteger} + {$secondInteger} = {$sum}";
    }
}

// Sample Input
$input = [
    'firstInteger' => 2,
    'secondInteger' => 2
];

// Calculate the result
$result = calculateSum($input['firstInteger'], $input['secondInteger']);

// Display the result
echo $result . "\n";

// Additional Output (As per your request)
echo "It is summertime!\n";

?>    
</body>
</html>