<?php
include '../db.php'; // Include database connection

// Handle add, edit, delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_order'])) {
        // Add order
        $user_order_id = $_POST['user_order_id'];
        $user_item_order_id = $_POST['user_item_order_id'];

        $sql = "INSERT INTO [Order] (user_order_id, user_item_order_id) VALUES (?, ?)";
        $params = array($user_order_id, $user_item_order_id);
        sqlsrv_query($conn, $sql, $params);
    } elseif (isset($_POST['edit_order'])) {
        // Edit order
        $order_id = $_POST['order_id'];
        $user_order_id = $_POST['user_order_id'];
        $user_item_order_id = $_POST['user_item_order_id'];

        $sql = "UPDATE [Order] SET user_order_id=?, user_item_order_id=? WHERE order_id=?";
        $params = array($user_order_id, $user_item_order_id, $order_id);
        sqlsrv_query($conn, $sql, $params);
    } elseif (isset($_GET['delete_id'])) {
        // Delete order
        $order_id = $_GET['delete_id'];
        $sql = "DELETE FROM [Order] WHERE order_id=?";
        $params = array($order_id);
        sqlsrv_query($conn, $sql, $params);
    }
}

// Fetch all users for the user dropdown
$userResult = sqlsrv_query($conn, 'SELECT user_id, user_name FROM [User]');
$users = [];
while ($row = sqlsrv_fetch_array($userResult, SQLSRV_FETCH_ASSOC)) {
    $users[] = $row;
}

// Fetch all items for the item dropdown
$itemResult = sqlsrv_query($conn, 'SELECT item_id, item_description FROM Item');
$items = [];
while ($row = sqlsrv_fetch_array($itemResult, SQLSRV_FETCH_ASSOC)) {
    $items[] = $row;
}

// Fetch all orders for viewing
$result = sqlsrv_query($conn, 'SELECT * FROM [Order]');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
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
    <h1>Order Management</h1>

    <!-- Form to Add/Edit Order -->
    <form method="post">
        <input type="hidden" name="order_id" id="order_id" value="">
        <div class="form-group">
            <label for="user_order_id">User:</label>
            <select class="form-control" name="user_order_id" id="user_order_id" required>
                <option value="">Select User</option>
                <?php foreach ($users as $user) { ?>
                    <option value="<?php echo $user['user_id']; ?>"><?php echo $user['user_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="user_item_order_id">Item:</label>
            <select class="form-control" name="user_item_order_id" id="user_item_order_id" required>
                <option value="">Select Item</option>
                <?php foreach ($items as $item) { ?>
                    <option value="<?php echo $item['item_id']; ?>"><?php echo $item['item_description']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="add_order" class="btn btn-primary">Add Order</button>
        <button type="submit" name="edit_order" class="btn btn-warning" style="display: none;">Edit Order</button>
    </form>

    <hr>

    <!-- Table to View Orders -->
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Item ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['user_order_id']; ?></td>
                    <td><?php echo $row['user_item_order_id']; ?></td>
                    <td>
                        <a href="#" onclick="editOrder(<?php echo $row['order_id']; ?>, <?php echo $row['user_order_id']; ?>, <?php echo $row['user_item_order_id']; ?>)" class="btn btn-warning">Edit</a>
                        <a href="?delete_id=<?php echo $row['order_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function editOrder(orderId, userOrderId, itemId) {
    document.getElementById('order_id').value = orderId;
    document.getElementById('user_order_id').value = userOrderId;
    document.getElementById('user_item_order_id').value = itemId;
    document.querySelector('button[name="add_order"]').style.display = 'none';
    document.querySelector('button[name="edit_order"]').style.display = 'inline-block';
}
</script>

<?php
sqlsrv_free_stmt($result);
sqlsrv_close($conn);
?>
</body>
</html>
