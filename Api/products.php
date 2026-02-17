<?php
include "../db.php";

$query = "SELECT id, name, price FROM products";
$result = mysqli_query($conn, $query);

$products = [];

while($row = mysqli_fetch_assoc($result)){
    $products[] = $row;
}

echo json_encode($products);
?>
