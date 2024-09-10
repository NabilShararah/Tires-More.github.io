<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Service</title>
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
    </style>
</head>
<body>
    <h2>Book a Service</h2>
    
    <form action="php/book_service.php" method="POST">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        <label for="service">Service:</label>
        <select id="service" name="service">
            <option value="tire_change">Tire Change</option>
            <option value="alignment">Alignment</option>
            <option value="rotation">Rotation</option>
        </select><br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br>
        <button type="submit">Book</button><br>
        <a href="index.php" class="back-button">Back</a>
    </form>
</body>
</html>
