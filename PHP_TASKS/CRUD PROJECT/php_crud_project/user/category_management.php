<?php
include '../db.php'; // Include database connection

// Fetch categories for dropdown
$categories = [];
$categoryResult = sqlsrv_query($conn, 'SELECT * FROM Category');
while ($row = sqlsrv_fetch_array($categoryResult, SQLSRV_FETCH_ASSOC)) {
    $categories[] = $row;
}

// Handle form submission for adding/editing categories
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_category'])) {
        $categoryName = $_POST['category_name'];
        $categoryDescription = $_POST['category_description'];
        $query = "INSERT INTO Category (category_name, category_description) VALUES (?, ?)";
        sqlsrv_query($conn, $query, array($categoryName, $categoryDescription));
    }
}

// Fetch categories again for the updated list
$categoryResult = sqlsrv_query($conn, 'SELECT * FROM Category');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
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
    <h1>Category Management</h1>
    <form method="post">
        <div class="form-group">
            <label for="category_name">Category Name:</label>
            <input type="text" class="form-control" name="category_name" id="category_name" required>
        </div>
        <div class="form-group">
            <label for="category_description">Description:</label>
            <textarea class="form-control" name="category_description" id="category_description" required></textarea>
        </div>
        <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
    </form>

    <hr>

    <!-- Table to View Categories -->
    <table class="table">
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($categoryResult, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['category_description']; ?></td>
                    <td>
                        <a href="#" onclick="editCategory(<?php echo $row['category_id']; ?>, '<?php echo addslashes($row['category_name']); ?>', '<?php echo addslashes($row['category_description']); ?>')" class="btn btn-warning">Edit</a>
                        <a href="?delete_id=<?php echo $row['category_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function editCategory(categoryId, categoryName, categoryDescription) {
    document.getElementById('category_id').value = categoryId;
    document.getElementById('category_name').value = categoryName;
    document.getElementById('category_description').value = categoryDescription;
    document.querySelector('button[name="add_category"]').style.display = 'none';
    document.querySelector('button[name="edit_category"]').style.display = 'inline-block';
}
</script>

<?php
sqlsrv_free_stmt($categoryResult);
sqlsrv_close($conn);
?>
</body>
</html>
