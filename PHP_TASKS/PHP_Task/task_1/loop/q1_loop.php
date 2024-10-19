<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Create an array of numbers from 1 to 10
$numbers = range(1, 10);

// Join the numbers with a dash and output the result
$output = implode('-', $numbers);
echo $output;
?>   
</body>
</html>