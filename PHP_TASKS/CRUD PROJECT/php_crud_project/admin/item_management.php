<?php
include '../db.php'; // Include database connection

// Fetch categories for dropdown
$categories = [];
$categoryResult = sqlsrv_query($conn, 'SELECT * FROM Category');
if ($categoryResult === false) {
    die(print_r(sqlsrv_errors(), true)); // Output any errors in the category query
}
while ($row = sqlsrv_fetch_array($categoryResult, SQLSRV_FETCH_ASSOC)) {
    $categories[] = $row;
}

// Handle form submission for adding/editing items
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_item'])) {
        $itemDescription = $_POST['item_description'];
        $itemImage = $_POST['item_image'];
        $itemTotalNumber = $_POST['item_total_number'];
        $categoryId = $_POST['category_id']; // Get selected category ID

        // Prepare and execute the insert query
        $query = "INSERT INTO Item (item_description, item_image, item_total_number, category_id) VALUES (?, ?, ?, ?)";
        $params = array($itemDescription, $itemImage, $itemTotalNumber, $categoryId);
        $stmt = sqlsrv_query($conn, $query, $params);

        // Check for errors in query execution
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Output any errors during the insertion
        } else {
            echo "<div class='alert alert-success'>Item added successfully!</div>";
        }
    }
}

// Fetch items again for the updated list
$itemResult = sqlsrv_query($conn, 'SELECT i.*, c.category_name FROM Item i JOIN Category c ON i.category_id = c.category_id');
if ($itemResult === false) {
    die(print_r(sqlsrv_errors(), true)); // Output any errors in the item query
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Items</title>
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
    <h1>Item Management</h1>
    <form method="post">
        <div class="form-group">
            <label for="item_description">Item Description:</label>
            <input type="text" class="form-control" name="item_description" id="item_description" required>
        </div>
        <div class="form-group">
            <label for="item_image">Item Image URL:</label>
            <input type="text" class="form-control" name="item_image" id="item_image" required>
        </div>
        <div class="form-group">
            <label for="item_total_number">Total Number:</label>
            <input type="number" class="form-control" name="item_total_number" id="item_total_number" required>
        </div>
        <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select class="form-control" name="category_id" id="category_id" required>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="add_item" class="btn btn-primary">Add Item</button>
    </form>

    <hr>

    <!-- Table to View Items -->
    <table class="table">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Description</th>
                <th>Image</th>
                <th>Total Number</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = sqlsrv_fetch_array($itemResult, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $item['item_id']; ?></td>
                    <td><?php echo $item['item_description']; ?></td>
                    <td><img src="<?php echo $item['item_image']; ?>" alt="Item Image" width="100"></td>
                    <td><?php echo $item['item_total_number']; ?></td>
                    <td><?php echo $item['category_name']; ?></td>
                    <td>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
sqlsrv_free_stmt($categoryResult);
sqlsrv_free_stmt($itemResult);
sqlsrv_close($conn);
?>
</body>
</html>
