<?php
session_start();
include 'db.php'; // Include file that establishes database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve booking details from the form submission
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $username = $_SESSION['username']; // Get username from session

    // Insert booking into database
    $query = "INSERT INTO bookings (service, date, time, username) VALUES ('$service', '$date', '$time', '$username')";
    if (mysqli_query($conn, $query)) {
        echo "Booking successful.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
