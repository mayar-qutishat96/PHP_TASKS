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
$colors = array('white', 'green', 'red');

// Display the colors as an unordered list
echo "<ul>\n";
foreach ($colors as $color) {
    echo " <li>$color</li>\n";
}
echo "</ul>\n";
?>  
</body>
</html>