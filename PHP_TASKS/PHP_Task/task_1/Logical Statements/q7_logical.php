<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function to check voting eligibility
function checkVotingEligibility($age) {
    if ($age >= 18) {
        return 'is eligible to vote';
    } else {
        return "'is not eligible to vote'";
    }
}

// Sample input
$age = 15;

// Check eligibility
$result = checkVotingEligibility($age);

// Output the result with the specified format
echo "$result"; // Output will be 'is not eligible to vote'
?>   
</body>
</html>