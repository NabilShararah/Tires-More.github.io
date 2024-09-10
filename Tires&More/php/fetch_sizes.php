
<?php
include 'db.php';

$sql = "SELECT DISTINCT size FROM tires";
$result = $conn->query($sql);

$sizes = array();
while($row = $result->fetch_assoc()) {
    $sizes[] = $row['size'];
}
echo json_encode($sizes);

$conn->close();
?>
