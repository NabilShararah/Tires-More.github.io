<?php
include 'db.php'; // Include file that establishes database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $passcode = isset($_POST['passcode']) ? $_POST['passcode'] : '';

    // Define the correct passcodes for worker and admin roles
    $workerPasscode = 'worker123'; // Example passcode for worker
    $adminPasscode = 'admin123';   // Example passcode for admin

    // Validate the passcode if the role is worker or admin
    if (($role === 'worker' && $passcode !== $workerPasscode) || 
        ($role === 'admin' && $passcode !== $adminPasscode)) {
        echo "Invalid passcode. Only authorized personnel can register as Worker or Admin.";
        exit(); // Stop further execution
    }

    // Insert user data into the database without hashing the password
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful. <a href='../index.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
