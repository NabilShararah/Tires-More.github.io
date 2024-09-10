<?php
session_start();

// Ensure the user is logged in as a worker
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
    header("Location: ../login.php");
    exit();
}

include 'php/db.php'; 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$today = date('Y-m-d');
$bookingsQuery = "
    SELECT * 
    FROM bookings 
    WHERE (status != 'Cancelled' AND status != 'Completed') 
    OR (status IN ('Cancelled', 'Completed') AND date >= '$today')
";
$bookingsResult = mysqli_query($conn, $bookingsQuery);

if (!$bookingsResult) {
    die("Error fetching bookings: " . mysqli_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'], $_POST['booking_id'])) {
    $status = $_POST['status'];
    $bookingId = $_POST['booking_id'];

    // Update the booking status in the database
    $updateQuery = "UPDATE bookings SET status='" . mysqli_real_escape_string($conn, $status) . "' WHERE id='" . mysqli_real_escape_string($conn, $bookingId) . "'";
    if (!mysqli_query($conn, $updateQuery)) {
        die("Error updating booking status: " . mysqli_error($conn));
    } else {
        header("Location: worker_dashboard.php"); // Refresh the page to show the updated status
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Worker Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
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

        .status-form {
            margin: 20px 0;
        }
    </style>
</head>
<body>
<a href="index.php" class="back-button">Back</a>
    <h2>Worker Dashboard</h2>

    <h3>Customer Appointments</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Username</th>
            <th>Status</th>
            <th>Update Status</th>
        </tr>
        <?php while ($booking = mysqli_fetch_assoc($bookingsResult)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($booking['id']); ?></td>
            <td><?php echo htmlspecialchars($booking['service']); ?></td>
            <td><?php echo htmlspecialchars($booking['date']); ?></td>
            <td><?php echo htmlspecialchars($booking['time']); ?></td>
            <td><?php echo htmlspecialchars($booking['username']); ?></td>
            <td><?php echo htmlspecialchars($booking['status'] ?? 'Pending'); ?></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                    <select name="status">
                        <option value="Pending" <?php if ($booking['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Completed" <?php if ($booking['status'] === 'Completed') echo 'selected'; ?>>Completed</option>
                        <option value="No Show" <?php if ($booking['status'] === 'No Show') echo 'selected'; ?>>No Show</option>
                        <option value="Cancelled" <?php if ($booking['status'] === 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>