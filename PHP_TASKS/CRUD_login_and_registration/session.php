<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
table{
    width: 90%;
    margin:auto;
    display: block;
  
}
table,tr,th,td{
    border: 1px solid rgb(200,200,200);
    border-collapse: collapse;
}





</style>
</head>
<body>
<div class="container mt-4">
        <h2>Users Information</h2>
        <a class="btn btn-primary mb-3" href="register.php" role="button">New User</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Image Path</th>
                    <th>PDF File Path</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('config.php'); // Ensure this file initializes a PDO instance named $pdo

                // Handle deletion
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
                    $stmt->execute([':id' => $id]);
                    // Optionally redirect after deletion
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit;
                }

                // Fetch user data
                $stmt = $pdo->query("SELECT * FROM users");
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($users) > 0) {
                    foreach ($users as $user) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($user['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['password']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['image_path']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['pdf_file_path']) . '</td>';
                        echo '<td>';
                        echo '<a href="delete.php?id=' . htmlspecialchars($user['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\');">Delete</a>';
                        echo ' <a href="update.php?id=' . htmlspecialchars($user['id']) . '" class="btn btn-warning">Update</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center">No users found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>  
</body>
</html>
