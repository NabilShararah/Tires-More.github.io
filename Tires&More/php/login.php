<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $role = $user['role'];

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("Location: ../admin_dashboard.php"); 
        } elseif ($role == 'worker') {
            header("Location: ../worker_dashboard.php"); 
        } else {
            header("Location: ../index.php"); 
        }
        exit(); 
    } else {
        echo "Invalid username or password.";
    }
}
?>
