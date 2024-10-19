<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input array
$color = array(4 => 'white', 6 => 'green', 11 => 'red');

// Display the first element of the array
$firstElement = reset($color); // Reset the array pointer to the first element
echo $firstElement . "\n";
?>
</body>
</html>