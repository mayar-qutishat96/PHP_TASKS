<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['position'] !== 'admin') {
    header("Location: login.php");
    exit();
}
$admin_id=$_SESSION['user']['id'];
$sql = "
    SELECT id, name, email, position 
    FROM users 
    WHERE id = $admin_id OR position = 'user' 
    ORDER BY CASE 
        WHEN id = $admin_id THEN 0 
        ELSE 1 
    END, name ASC
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $deleteSql = "DELETE FROM users WHERE id = ?";
    $deleteStmt = $pdo->prepare($deleteSql);
    $deleteStmt->execute([$userId]);
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                           <?php
if($user['position']=="user"){
                           ?>
                            <a href="?delete=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            <?php
}
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
