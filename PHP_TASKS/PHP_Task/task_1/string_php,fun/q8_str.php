<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to replace the first word of a sentence with another word
function replaceFirstWord($sentence, $newWord) {
    // Use a regular expression to match the first word
    return preg_replace('/^\w+/', $newWord, $sentence);
}

// Example usage
$inputSentence = 'That new trainee is so genius.';
$replacementWord = 'Our';
$result = replaceFirstWord($inputSentence, $replacementWord);

// Display result
echo " $result\n"; // Display the modified sentence
?>  
</body>
</html>