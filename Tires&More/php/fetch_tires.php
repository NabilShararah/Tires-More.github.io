<?php
include 'db.php';

$size = isset($_GET['size']) ? $_GET['size'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

$sql = "SELECT * FROM tires";
$conditions = [];

if ($size !== '') {
    $conditions[] = "size = '" . $conn->real_escape_string($size) . "'";
}

if ($price !== '') {
    $conditions[] = "price <= " . intval($price);
}

if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}



$result = $conn->query($sql);

$tires = array();
while($row = $result->fetch_assoc()) {
    $tires[] = $row;
}

echo json_encode($tires);

$conn->close();
?>
