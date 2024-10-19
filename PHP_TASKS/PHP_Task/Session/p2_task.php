<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <?php
    session_start();
    ?>
    
    <h1>User List</h1>
    
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php
        if (isset($_SESSION["users"]) && count($_SESSION["users"]) > 0) {
            foreach ($_SESSION["users"] as $user) {
                echo "<tr>
                        <td>" . htmlspecialchars($user["name"]) . "</td>
                        <td>" . htmlspecialchars($user["email"]) . "</td>
                        <td>" . htmlspecialchars($user["password"]) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users registered.</td></tr>";
        }
        ?>
    </table>
    
    <a href="p_task.php">Back to Form</a> <!-- Link to go back to the form -->
</body>
</html>