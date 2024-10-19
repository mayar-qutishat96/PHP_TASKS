<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Function to determine the season based on temperature
function checkSeason($temperature) {
    if ($temperature < 20) {
        return "'It is wintertime!'";
    } else {
        return "'It is summertime!'";
    }
}

// Sample Input
$temperature = 27; // You can change this value for different inputs

// Get the season and display the result
$season = checkSeason($temperature);
echo $season . "\n";

?>  
</body>
</html>