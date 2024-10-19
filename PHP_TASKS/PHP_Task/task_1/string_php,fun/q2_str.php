<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to format numeric string to time
function formatTime($numericString) {
    // Check if the length of the string is 6
    if (strlen($numericString) !== 6) {
        return "Invalid input. Please provide a 6-digit numeric string.";
    }

    // Split the string into hours, minutes, and seconds
    $hours = substr($numericString, 0, 2);
    $minutes = substr($numericString, 2, 2);
    $seconds = substr($numericString, 4, 2);

    // Format the time
    return "{$hours}:{$minutes}:{$seconds}";
}

// Example usage
$inputString = '085119';
$formattedTime = formatTime($inputString);

// Display result
echo "Formatted Time: $formattedTime\n";
?>  
</body>
</html>