<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newImageName = 'image_' . date('Ymd_His') . '.' . $imageExtension; 
            $imagePath = 'uploads/' . $newImageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }
    }

    $pdfFilePath = null;
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
        if ($_FILES['pdf_file']['type'] == 'application/pdf') {
            $pdfExtension = pathinfo($_FILES['pdf_file']['name'], PATHINFO_EXTENSION);
            $newPdfName = 'file_' . date('Ymd_His') . '.' . $pdfExtension;
            $pdfFilePath = 'uploads/' . $newPdfName;
            move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdfFilePath);
        }
    }

    
    $sql = "INSERT INTO users (name, email, password, image_path, pdf_file_path) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $email, $password, $imagePath, $pdfFilePath])) {
        $success_message = "Registration completed successfully! You can now log in.";
    } else {
        $error_message = "Registration failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: linear-gradient(90deg, #4a4a4a, #b6b6b6);
        }
        #password {
            -webkit-text-security: disc;
            text-security: disc;
        }
        .form-width {
            width: 50%;
            margin: auto; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data" class="border p-4 shadow form-width" style="background-color: #ffffff; border-radius: 20px">
            <h2 class="text-center">Create a New Account</h2>
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
            <?php elseif (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Image (PNG, JPG, JPEG)</label>
                <input type="file" name="image" id="image" class="form-control" accept=".png, .jpg, .jpeg" required>
            </div>
            <div class="form-group">
                <label for="pdf_file">Upload PDF</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <p class="mt-3 text-center">Already have an account? <a href="login.php">Log in here</a></p>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
