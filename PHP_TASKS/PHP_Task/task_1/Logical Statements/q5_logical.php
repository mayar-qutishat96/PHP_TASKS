<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Sample input: number of units consumed
$units = 320; // You can change this value to test other inputs

// Function to calculate electricity bill
function calculateElectricityBill($units) {
    $bill = 0;

    // Calculate bill based on the unit consumption
    if ($units <= 50) {
        $bill = $units * 2.50;
    } elseif ($units <= 150) {
        $bill = (50 * 2.50) + (($units - 50) * 5.00);
    } elseif ($units <= 250) {
        $bill = (50 * 2.50) + (100 * 5.00) + (($units - 150) * 6.20);
    } else {
        $bill = (50 * 2.50) + (100 * 5.00) + (100 * 6.20) + (($units - 250) * 7.50);
    }

    return $bill; // Return the total bill
}

// Calculate the bill
$electricityBill = calculateElectricityBill($units);

// Display the output
echo "The monthly electricity bill for $units units is: " . number_format($electricityBill, 2) . " JOD\n";
?>  
</body>
</html>