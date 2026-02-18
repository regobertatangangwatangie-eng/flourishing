<?php
session_start();

// Check login status
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == 0) {
    $_SESSION['message'] = "You need to first login to access this page !!!";
    header("Location: Login/error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Market - AgroCulture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="indexFooter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
</head>

<body>
    <?php require 'menu.php'; ?>

    <!-- Main Section -->
    <section id="one" class="wrapper style1 align-center" style="min-height: 600px;">
        <div class="container">
            <h2>Welcome to Digital Market</h2>
            <br><br>
            <div class="row 200%">
                <section class="4u 12u$(small)">
                    <a href="profileView.php"><img src="profileDefault.png" alt="Profile"></a>
                    <p>Your Profile</p>
                </section>
                <section class="4u 12u$(small)">
                    <a href="productMenu.php?n=1" name="catSearch"><img src="search.png" alt="Search"></a>
                    <p>Search according to your needs</p>
                </section>
                <section class="4u$ 12u$(small)">
                    <a href="productMenu.php?n=0"><img src="product.png" alt="Products"></a>
                    <p>Our Products</p>
                </section>
            </div>
        </div>
    </section>

    <!-- Optional Footer -->
    <?php /* Include footer here if needed */ ?>
</body>
</html>
