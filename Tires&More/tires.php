<?php
include 'php/db.php'; 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch all tires
$query = "SELECT * FROM tires";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Display tires
    echo "<h1>Tires List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Size</th><th>Price</th><th>Image</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['size']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td><img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "' width='100'></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No tires found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            background-image: url('Images/tires$more.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            margin: 0;
            padding: 0;
            height: 100vh; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8); 
            color: #333; 
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; 
            color: white; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        tr:hover {
            background-color: #ddd; 
        }
    </style>
</head>
<body>