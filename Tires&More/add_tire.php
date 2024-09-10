<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Tire</title>
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
    <h1>Add New Tire</h1>
    <a class="back-button" href="admin_dashboard.php">Back to Dashboard</a>
    <form action="process_add_tire.php" method="POST" enctype="multipart/form-data">
    <label for="name">Tire Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="size">Size:</label>
    <input type="text" id="size" name="size" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required>

    <label for="image_url">Image URL:</label>
    <input type="text" id="image_url" name="image_url" required>

    <input type="submit" value="Add Tire">
</form>
    
</body>
</html>
