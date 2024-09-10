<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

include 'php/db.php'; 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if an image URL was provided
$imageUrl = isset($_POST['image_url']) ? $_POST['image_url'] : ''; 

$stmt = $conn->prepare("INSERT INTO tires (name, size, price, image_url) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $size, $price, $imageUrl);

$name = $_POST['name'];
$size = $_POST['size'];
$price = $_POST['price'];

if ($stmt->execute()) {
    header("Location: tires.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
?>
