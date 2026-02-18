<?php 
session_start();
require 'db.php';

// Redirect if not logged in
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == 0) {
    $_SESSION['message'] = "You need to first login to access this page !!!";
    header("Location: Login/error.php");
    exit;
}

$bid = $_SESSION['id'];

// Add product to cart if flag is set
if(isset($_GET['flag']) && isset($_GET['pid'])) {
    $pid = intval($_GET['pid']); // sanitize
    $sql = "INSERT INTO mycart (bid,pid) VALUES ('$bid', '$pid')";
    mysqli_query($conn, $sql);
}

// Utility function to sanitize output
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture: My Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css"/>
    <link rel="stylesheet" href="css/skel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/style-xlarge.css"/>
</head>
<body>

<?php require 'menu.php'; ?>

<!-- Main Cart Section -->
<section id="main" class="wrapper style1 align-center">
    <div class="container">
        <h2>My Cart</h2>

        <section id="two" class="wrapper style2 align-center">
            <div class="container">
                <div class="row">

                <?php
                // Fetch cart items
                $sqlCart = "SELECT * FROM mycart WHERE bid = '$bid'";
                $cartResult = mysqli_query($conn, $sqlCart);
                while($cartRow = mysqli_fetch_assoc($cartResult)):
                    $pid = $cartRow['pid'];
                    $sqlProduct = "SELECT * FROM fproduct WHERE pid = '$pid'";
                    $productResult = mysqli_query($conn, $sqlProduct);
                    $product = mysqli_fetch_assoc($productResult);
                    $picDestination
