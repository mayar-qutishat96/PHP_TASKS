<?php
include '../db.php'; // Include database connection

// Handle add, edit, delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_basket'])) {
        // Add item to shopping basket
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO ShoppingBasket (user_id, item_id, quantity) VALUES (?, ?, ?)";
        $params = array($user_id, $item_id, $quantity);
        sqlsrv_query($conn, $sql, $params);
    } elseif (isset($_POST['edit_basket'])) {
        // Edit item in shopping basket
        $basket_id = $_POST['basket_id'];
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE ShoppingBasket SET user_id=?, item_id=?, quantity=? WHERE basket_id=?";
        $params = array($user_id, $item_id, $quantity, $basket_id);
        sqlsrv_query($conn, $sql, $params);
    } elseif (isset($_GET['delete_id'])) {
        // Delete item from shopping basket
        $basket_id = $_GET['delete_id'];
        $sql = "DELETE FROM ShoppingBasket WHERE basket_id=?";
        $params = array($basket_id);
        sqlsrv_query($conn, $sql, $params);
    }
}

// Fetch all items in the shopping basket for viewing, joining with User and Item
$query = "SELECT sb.basket_id, u.user_name, i.item_description, sb.quantity
          FROM ShoppingBasket sb
          JOIN [User] u ON sb.user_id = u.user_id
          JOIN Item i ON sb.item_id = i.item_id";

$result = sqlsrv_query($conn, $query);

// Fetch users for dropdown
$userResult = sqlsrv_query($conn, 'SELECT user_id, user_name FROM [User]');
if ($userResult === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch items for dropdown
$itemResult = sqlsrv_query($conn, 'SELECT item_id, item_description FROM Item');
if ($itemResult === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Basket Management</title>
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
    <h1>Shopping Basket Management</h1>

    <!-- Form to Add/Edit Basket Item -->
    <form method="post">
        <input type="hidden" name="basket_id" id="basket_id" value="">
        <div class="form-group">
            <label for="user_id">User:</label>
            <select class="form-control" name="user_id" id="user_id" required>
                <option value="">Select User</option>
                <?php while ($userRow = sqlsrv_fetch_array($userResult, SQLSRV_FETCH_ASSOC)) { ?>
                    <option value="<?php echo $userRow['user_id']; ?>"><?php echo $userRow['user_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="item_id">Item:</label>
            <select class="form-control" name="item_id" id="item_id" required>
                <option value="">Select Item</option>
                <?php while ($itemRow = sqlsrv_fetch_array($itemResult, SQLSRV_FETCH_ASSOC)) { ?>
                    <option value="<?php echo $itemRow['item_id']; ?>"><?php echo $itemRow['item_description']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" id="quantity" required>
        </div>
        <button type="submit" name="add_basket" class="btn btn-primary">Add to Basket</button>
        <button type="submit" name="edit_basket" class="btn btn-warning" style="display: none;">Edit Basket Item</button>
    </form>

    <hr>

    <!-- Table to View Shopping Basket Items -->
    <table class="table">
        <thead>
            <tr>
                <th>Basket ID</th>
                <th>User Name</th>
                <th>Item Description</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['basket_id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['item_description']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>
                        <a href="#" onclick="editBasket(<?php echo $row['basket_id']; ?>, '<?php echo $row['user_name']; ?>', '<?php echo $row['item_description']; ?>', <?php echo $row['quantity']; ?>)" class="btn btn-warning">Edit</a>
                        <a href="?delete_id=<?php echo $row['basket_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function editBasket(basketId, userName, itemDescription, quantity) {
    document.getElementById('basket_id').value = basketId;
    document.getElementById('user_id').value = userName; // Adjusted for user name
    document.getElementById('item_id').value = itemDescription; // Adjusted for item description
    document.getElementById('quantity').value = quantity;
    document.querySelector('button[name="add_basket"]').style.display = 'none';
    document.querySelector('button[name="edit_basket"]').style.display = 'inline-block';
}
</script>

<?php
sqlsrv_free_stmt($result);
sqlsrv_free_stmt($userResult);
sqlsrv_free_stmt($itemResult);
sqlsrv_close($conn);
?>
</body>
</html>
