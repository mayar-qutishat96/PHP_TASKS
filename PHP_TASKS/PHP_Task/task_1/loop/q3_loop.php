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

// Initialize a variable to keep track of the letters
$currentLetter = 'A';

// Loop through each row
for ($i = 0; $i < $rows; $i++) {
    // Loop for the columns
    for ($j = 0; $j < $rows; $j++) {
        // Check if we need to print the current letter or 'A'
        if ($j < $rows - $i - 1) {
            echo $currentLetter . ' ';
        } else {
            echo $currentLetter . ' ';
        }
    }
    
    // Move to the next line
    echo "\n";
    
    // Update the current letter for the next row
    if ($i < $rows - 1) {
        $currentLetter++;
    }
}
?>   
</body>
</html>