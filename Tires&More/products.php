<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Tires</title>
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

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin: 20px;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-button">Back</a>
    <h2>Our Tires</h2>
    <label for="size">Filter by Size:</label>
    <select class="tireS" id="size" name="size" onchange="filterTires()">
        <option value="">Select Size</option>
        <?php
        include 'php/db.php'; 

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to fetch unique sizes from the tires table
        $sizeQuery = "SELECT DISTINCT size FROM tires ORDER BY size ASC";
        $sizeResult = $conn->query($sizeQuery);

        if ($sizeResult->num_rows > 0) {
            // Output each size as an option
            while ($sizeRow = $sizeResult->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($sizeRow['size']) . "'>" . htmlspecialchars($sizeRow['size']) . "</option>";
            }
        }
        ?>
    </select>
    <label for="price">Filter by Price:</label>
    <input type="number" id="price" name="price" oninput="filterTires()">

    <?php
    // Query to fetch all tires
    $query = "SELECT * FROM tires";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Display tires
        echo "<h1>Tires List</h1>";
        echo "<table id='tiresTable'>";
        echo "<tr><th>Name</th><th>Size</th><th>Price</th><th>Image</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-size='" . htmlspecialchars($row['size']) . "' data-price='" . htmlspecialchars($row['price']) . "'>";
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

    <script>
        function filterTires() {
            const sizeFilter = document.getElementById('size').value.toLowerCase();
            const priceFilter = document.getElementById('price').value;
            const rows = document.querySelectorAll('#tiresTable tr:not(:first-child)');

            rows.forEach(row => {
                const size = row.getAttribute('data-size').toLowerCase();
                const price = parseFloat(row.getAttribute('data-price'));

                let showRow = true;

                if (sizeFilter && size !== sizeFilter) {
                    showRow = false;
                }

                if (priceFilter && price > parseFloat(priceFilter)) {
                    showRow = false;
                }

                row.style.display = showRow ? '' : 'none';
            });
        }
    </script>
</body>
</html>
