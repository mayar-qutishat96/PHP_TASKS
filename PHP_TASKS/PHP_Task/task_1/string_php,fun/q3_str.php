<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to check if a specific word exists in a sentence
function checkWordInSentence($sentence, $word) {
    // Convert both the sentence and the word to lowercase for case-insensitive comparison
    $sentenceLower = strtolower($sentence);
    $wordLower = strtolower($word);
    
    // Check if the word exists in the sentence
    if (strpos($sentenceLower, $wordLower) !== false) {
        return 'Word Found!';
    } else {
        return 'Word Not Found!';
    }
}

// Example usage
$inputSentence = 'I am a full stack developer at orange coding academy';
$inputWord = 'Orange';

$result = checkWordInSentence($inputSentence, $inputWord);

// Display result
echo $result . "\n";
?>  
</body>
</html>