<?php
require('db.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Fetch the submitted password

    // Query to fetch user data
    $query = "SELECT * FROM user2 WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Check if user exists and verify password
    if ($user && password_verify($password, $user['password'])) {
        
        // Check the role directly from the fetched data
        if ($user['roles'] == 'admin') { 
            header("Location: hallway.php"); // Admins go to admin dashboard
            exit;
        } else {
            header("Location: the student.php"); // Regular users go to a normal dashboard
            exit;
        }
        
    } else {
        echo 'Invalid password or username';
    }
}
?>
