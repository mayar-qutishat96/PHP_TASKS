<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Define the number of rows
$rows = 5;

// Loop through each row
for ($i = 0; $i < $rows; $i++) {
    // Loop for the columns
    for ($j = 0; $j < $rows; $j++) {
        // Check conditions to print the correct number
        if ($j < $rows - $i - 1) {
            echo '1 ';
        } elseif ($i === 2 && $j === 2) {
            echo '3 ';
        } elseif ($i === 3) {
            echo '4 ';
        } elseif ($i === 4) {
            echo '5 ';
        } else {
            echo ($i + 1) . ' ';
        }
    }
    
    // Move to the next line
    echo "\n";
}
?>   
</body>
</html>