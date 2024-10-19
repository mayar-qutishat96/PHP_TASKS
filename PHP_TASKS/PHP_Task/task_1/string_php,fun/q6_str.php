<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to get the last three characters from a string
function getLastThreeCharacters($string) {
    // Use substr to get the last three characters
    return substr($string, -3);
}

// Example usage
$inputString = 'info@orange.com';
$lastThreeChars = getLastThreeCharacters($inputString);

// Display result
echo "'$lastThreeChars'\n"; // Display the last three characters
?>   
</body>
</html>