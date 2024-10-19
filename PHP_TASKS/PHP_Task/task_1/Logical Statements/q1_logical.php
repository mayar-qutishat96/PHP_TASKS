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
$input = [
    'firstInteger' => 10,
    'secondInteger' => 10
];

// Function to check the sum
function checkSum($numbers) {
    $sum = $numbers['firstInteger'] + $numbers['secondInteger'];
    
    // Check if the sum equals 30
    if ($sum === 30) {
        return $sum; // Return the sum if it equals 30
    } else {
        return "'false'"; // Return 'false' if it does not
    }
}

// Get the result
$result = checkSum($input);

// Display the output
echo $result;
?>
</body>
</html>