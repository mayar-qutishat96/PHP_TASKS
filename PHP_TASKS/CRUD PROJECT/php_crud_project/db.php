<?php
// Database connection using MySQLi for MySQL
$servername = "localhost";  // Usually 'localhost' for phpMyAdmin
$username = "root";         // Your MySQL username (usually 'root')
$password = "";             // Your MySQL password (leave empty if not set)
$dbname = "user_db";        // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
