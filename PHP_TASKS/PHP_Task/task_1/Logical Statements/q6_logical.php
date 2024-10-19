<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Function for addition
function add($a, $b) {
    return $a + $b;
}

// Function for subtraction
function subtract($a, $b) {
    return $a - $b;
}

// Function for multiplication
function multiply($a, $b) {
    return $a * $b;
}

// Function for division
function divide($a, $b) {
    if ($b == 0) {
        return 'Error: Division by zero is not allowed.';
    }
    return $a / $b;
}

// Sample input
$num1 = 10;
$num2 = 5;

// Operation choice (can be changed to test different operations)
$operation = 'addition'; // Options: 'addition', 'subtraction', 'multiplication', 'division'

// Calculate result based on the chosen operation
switch ($operation) {
    case 'addition':
        $result = add($num1, $num2);
        break;
    case 'subtraction':
        $result = subtract($num1, $num2);
        break;
    case 'multiplication':
        $result = multiply($num1, $num2);
        break;
    case 'division':
        $result = divide($num1, $num2);
        break;
    default:
        $result = 'Error: Invalid operation.';
}

// Output the result
echo "The result of $operation between $num1 and $num2 is: $result";
?>   
</body>
</html>