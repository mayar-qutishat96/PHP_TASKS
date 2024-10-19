<?php
include '../db.php';

// Handle add, edit, delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        // Add user
        $user_name = $_POST['user_name'];
        $user_mobile = $_POST['user_mobile'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        
        $sql = "INSERT INTO [User] (user_name, user_mobile, user_email, user_address) VALUES (?, ?, ?, ?)";
        $params = array($user_name, $user_mobile, $user_email, $user_address);
        sqlsrv_query($conn, $sql, $params);
    } elseif (isset($_POST['edit_user'])) {
        // Edit user
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $user_mobile = $_POST['user_mobile'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        
        $sql = "UPDATE [User] SET user_name=?, user_mobile=?, user_email=?, user_address=? WHERE user_id=?";
        $params = array($user_name, $user_mobile, $user_email, $user_address, $user_id);
        sqlsrv_query($conn, $sql, $params);
    } elseif (isset($_GET['delete_id'])) {
        // Delete user
        $user_id = $_GET['delete_id'];
        $sql = "DELETE FROM [User] WHERE user_id=?";
        $params = array($user_id);
        sqlsrv_query($conn, $sql, $params);
    }
}

// Fetch all users for viewing
$result = sqlsrv_query($conn, 'SELECT * FROM [User]');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
    <h1>User Management</h1>

    <!-- Form to Add/Edit User -->
    <form method="post">
        <input type="hidden" name="user_id" id="user_id" value="">
        <div class="form-group">
            <label for="user_name">Name:</label>
            <input type="text" class="form-control" name="user_name" id="user_name" required>
        </div>
        <div class="form-group">
            <label for="user_mobile">Mobile:</label>
            <input type="text" class="form-control" name="user_mobile" id="user_mobile">
        </div>
        <div class="form-group">
            <label for="user_email">Email:</label>
            <input type="email" class="form-control" name="user_email" id="user_email">
        </div>
        <div class="form-group">
            <label for="user_address">Address:</label>
            <textarea class="form-control" name="user_address" id="user_address"></textarea>
        </div>
        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
        <button type="submit" name="edit_user" class="btn btn-warning">Edit User</button>
    </form>

    <hr>

    <!-- Table to View Users -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_mobile']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['user_address']; ?></td>
                    <td>
                        <a href="#" onclick="editUser(<?php echo $row['user_id']; ?>, '<?php echo $row['user_name']; ?>', '<?php echo $row['user_mobile']; ?>', '<?php echo $row['user_email']; ?>', '<?php echo $row['user_address']; ?>')" class="btn btn-warning">Edit</a>
                        <a href="?delete_id=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function editUser(id, name, mobile, email, address) {
    document.getElementById('user_id').value = id;
    document.getElementById('user_name').value = name;
    document.getElementById('user_mobile').value = mobile;
    document.getElementById('user_email').value = email;
    document.getElementById('user_address').value = address;
    document.querySelector('button[name="add_user"]').style.display = 'none';
    document.querySelector('button[name="edit_user"]').style.display = 'inline-block';
}
</script>

<?php
sqlsrv_free_stmt($result);
sqlsrv_close($conn);
?>
</body>
</html>
