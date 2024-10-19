<?php
include '../db.php'; // Include database connection

// Fetch categories
$categoryResult = sqlsrv_query($conn, 'SELECT * FROM Category');

if ($categoryResult === false) {
    die(print_r(sqlsrv_errors(), true)); // Output SQL errors if the query fails
}

// Check if categories were retrieved
$categories = [];
while ($row = sqlsrv_fetch_array($categoryResult, SQLSRV_FETCH_ASSOC)) {
    $categories[] = $row; // Store each category
}

// Fetch items for each category
$itemsByCategory = [];
foreach ($categories as $category) {
    $categoryId = $category['category_id'];
    $itemsResult = sqlsrv_query($conn, "SELECT * FROM Item WHERE category_id = ?", array($categoryId));
    
    if ($itemsResult === false) {
        die(print_r(sqlsrv_errors(), true)); // Output SQL errors if the query fails
    }
    
    // Store the result set for this category
    $itemsByCategory[$categoryId] = $itemsResult;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">CRUD Project</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../admin/user_management.php">Manage Users</a></li>
            <li class="nav-item"><a class="nav-link" href="../admin/item_management.php">Manage Items</a></li>
            <li class="nav-item"><a class="nav-link" href="../user/category_management.php">Manage Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="../admin/order_management.php">Manage Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="../user/shopping_basket_management.php">Manage Basket</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1>Welcome to Our Store</h1>
    <h2>Categories</h2>
    <ul class="list-group">
        <?php if (count($categories) > 0) { ?>
            <?php foreach ($categories as $category) { ?>
                <li class="list-group-item">
                    <h3><?php echo $category['category_name']; ?></h3>
                    <p><?php echo $category['category_description']; ?></p>
                    <h4>Items in this Category:</h4>
                    <ul>
                        <?php
                        $items = $itemsByCategory[$category['category_id']];
                        $hasItems = false;
                        while ($itemRow = sqlsrv_fetch_array($items, SQLSRV_FETCH_ASSOC)) {
                            echo "<li>{$itemRow['item_description']} (ID: {$itemRow['item_id']})</li>";
                            $hasItems = true; // Flag if items are found
                        }
                        if (!$hasItems) {
                            echo "<li>No items found in this category.</li>";
                        }
                        ?>
                    </ul>
                </li>
            <?php } ?>
        <?php } else { ?>
            <li class="list-group-item">No categories found.</li>
        <?php } ?>
    </ul>
</div>

<?php
sqlsrv_free_stmt($categoryResult);
foreach ($itemsByCategory as $items) {
    sqlsrv_free_stmt($items); // Free each items statement
}
sqlsrv_close($conn);
?>
</body>
</html>
