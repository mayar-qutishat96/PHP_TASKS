<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Original numeric string
$originalString = '2,543.12';

// Remove commas using str_replace
$modifiedString = str_replace(',', '', $originalString);

// Display the result
echo "{$modifiedString}\n";

?>   
</body>
</html>