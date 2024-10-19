<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to perform string conversions
function convertString($input) {
    // Convert to uppercase
    $uppercase = strtoupper($input);

    // Convert to lowercase
    $lowercase = strtolower($input);

    // Make the first letter uppercase
    $capitalizeFirst = ucfirst(strtolower($input));

    // Make the first letter of each word capitalized
    $capitalizeWords = ucwords(strtolower($input));

    // Return results
    return [
        'uppercase' => $uppercase,
        'lowercase' => $lowercase,
        'capitalize_first' => $capitalizeFirst,
        'capitalize_words' => $capitalizeWords,
    ];
}

// Example usage
$inputString = "hello world! welcome to PHP.";

// Get converted strings
$results = convertString($inputString);

// Display results
echo "Original String: $inputString\n";
echo "Uppercase: {$results['uppercase']}\n";
echo "Lowercase: {$results['lowercase']}\n";
echo "First letter uppercase: {$results['capitalize_first']}\n";
echo "First letter of each word capitalized: {$results['capitalize_words']}\n";
?>   
</body>
</html>