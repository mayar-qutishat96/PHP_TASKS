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
        // Check if we're at the diagonal position
        if ($i === $j) {
            echo ($i + 1) . ' '; // Print the number for the diagonal
        } else {
            echo '0 '; // Print 0 for other positions
        }
    }
    
    // Move to the next line
    echo "\n";
}
?>  
</body>
</html>