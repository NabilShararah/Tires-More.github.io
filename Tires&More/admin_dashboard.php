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

$workersQuery = "SELECT * FROM users WHERE role='worker'";
$workersResult = mysqli_query($conn, $workersQuery);

if (!$workersResult) {
    die("Error fetching workers: " . mysqli_error($conn));
}

$customersQuery = "SELECT * FROM users WHERE role='customer'";
$customersResult = mysqli_query($conn, $customersQuery);

if (!$customersResult) {
    die("Error fetching customers: " . mysqli_error($conn));
}

$servicesQuery = "SELECT * FROM bookings"; 
$servicesResult = mysqli_query($conn, $servicesQuery);


if (!$servicesResult) {
    die("Error fetching services booked: " . mysqli_error($conn));
}
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
    <h2>Admin Dashboard</h2>
    <header>
        <h1>Welcome to Our Tire Shop</h1>
        <nav>
           
            <a href="products.php">View Tires</a>
            <a href="add_tire.php">Add a Tire</a>
            <a href="php/logout.php">Logout </a>
        </nav>
    </header>

    <h2>Workers</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
        <?php while ($worker = mysqli_fetch_assoc($workersResult)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($worker['id']); ?></td>
            <td><?php echo htmlspecialchars($worker['username']); ?></td>
            <td><?php echo htmlspecialchars($worker['role']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Customers</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
        <?php while ($customer = mysqli_fetch_assoc($customersResult)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($customer['id']); ?></td>
            <td><?php echo htmlspecialchars($customer['username']); ?></td>
            <td><?php echo htmlspecialchars($customer['role']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Services Booked</h2>
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Username</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        <?php while ($service = mysqli_fetch_assoc($servicesResult)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($service['id']); ?></td>
            <td><?php echo htmlspecialchars($service['username']); ?></td>
            <td><?php echo htmlspecialchars($service['service']); ?></td>
            <td><?php echo htmlspecialchars($service['date']); ?></td>
            <td><?php echo htmlspecialchars($service['time']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn); 
?>
