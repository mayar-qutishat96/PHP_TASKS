<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Declare the strings
$string1 = 'dragonball';
$string2 = 'dragonboll';

function findFirstDifference($str1, $str2) {
    // Get the length of the shorter string
    $length = min(strlen($str1), strlen($str2));
    
    // Loop through each character in both strings
    for ($i = 0; $i < $length; $i++) {
        if ($str1[$i] !== $str2[$i]) {
            // If characters differ, return the position and the characters
            return "First difference between two strings at position " . ($i + 1) . ": \"" . $str1[$i] . "\" vs \"" . $str2[$i] . "\"";
        }
    }
    
    // If no differences found and the strings are of different lengths
    if (strlen($str1) !== strlen($str2)) {
        return "Strings differ in length at position " . ($length + 1) . ": end of string 1 vs \"" . (isset($str2[$length]) ? $str2[$length] : 'end') . "\"";
    }

    // If strings are identical
    return "No differences found. Strings are identical.";
}

// Call the function and display the result
$result = findFirstDifference($string1, $string2);
echo $result;

?>  
</body>
</html>