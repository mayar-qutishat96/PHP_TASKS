<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $imagePath = $user['image_path']; 
    $pdfFilePath = $user['pdf_file_path']; 

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newImageName = 'image_' . date('Ymd_His') . '.' . $imageExtension; 
            $imagePath = 'uploads/' . $newImageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        } else {
            $error_message = "Invalid image type!";
        }
    }

    // Handle PDF upload
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == UPLOAD_ERR_OK) {
        if ($_FILES['pdf_file']['type'] == 'application/pdf') {
            $pdfExtension = pathinfo($_FILES['pdf_file']['name'], PATHINFO_EXTENSION);
            $newPdfName = 'file_' . date('Ymd_His') . '.' . $pdfExtension; 
            $pdfFilePath = 'uploads/' . $newPdfName;
            move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdfFilePath);
        } else {
            $error_message = "Invalid PDF type!";
        }
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "UPDATE users SET name = ?, email = ?, image_path = ?, pdf_file_path = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$name, $email, $imagePath, $pdfFilePath, $user['id']])) {
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['image_path'] = $imagePath;
        $_SESSION['user']['pdf_file_path'] = $pdfFilePath;
        $success_message = "Information updated successfully!";
    } else {
        $error_message = "Update failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data" class="border p-4 shadow">
            <h2 class="text-center">Update Information</h2>
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
            <?php elseif (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Upload New Image (PNG, JPG, JPEG)</label>
                <input type="file" name="image" id="image" class="form-control" accept=".png, .jpg, .jpeg">
            </div>
            <div class="form-group">
                <label for="pdf_file">Upload New PDF</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
