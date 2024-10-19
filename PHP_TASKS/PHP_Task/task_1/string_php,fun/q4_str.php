<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to extract the file name from a URL
function getFileNameFromUrl($url) {
    // Use basename to get the file name from the URL
    return basename($url);
}

// Example usage
$inputUrl = 'www.orange.com/index.php';
$fileName = getFileNameFromUrl($inputUrl);

// Display result
echo "'$fileName'\n"; // Add quotes around the output
?>   
</body>
</html>