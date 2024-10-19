<?php
include 'config.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Use the correct column name
    $query = "DELETE FROM `users` WHERE `id` = :user_id"; // Update to the correct column name
    $statement = $pdo->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    
    if ($statement->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No user ID specified.";
}
?>
