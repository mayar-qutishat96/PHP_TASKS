<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// استرجاع بيانات المستخدم من الجلسة
$user = $_SESSION['user'];

// تأكد من أن مسار الصورة موجود
$imagePath = !empty($user['image_path']) ? htmlspecialchars($user['image_path']) : 'default.jpg'; // استخدم صورة افتراضية إذا لم توجد صورة
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <!-- عرض الصورة فوق اسم المستخدم -->
        <img src="<?php echo $imagePath; ?>" alt="User Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
        
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        
        <div>
            <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Update Information</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
