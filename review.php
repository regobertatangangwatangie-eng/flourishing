<?php 
session_start();
require 'db.php';

// Validate pid
$pid = isset($_GET['pid']) ? (int)$_GET['pid'] : 0;
if ($pid <= 0) {
    die("Invalid Product ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture: Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="Blog/commentBox.css" />
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>

<?php
require 'menu.php';

// Fetch product
$sql = "SELECT * FROM fproduct WHERE pid = '$pid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Product not found.");
}

$fid = $row['fid'];
$sql = "SELECT * FROM farmer WHERE fid = '$fid'";
$result = mysqli_query($conn, $sql);
$frow = mysqli_fetch_assoc($result);

$picDestination = "images/productImages/" . htmlspecialchars($row['pimage']);
?>

<section id="main" class="wrapper style1 align-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img class="img-responsive" src="<?php echo $picDestination; ?>" alt="<?php echo htmlspecialchars($row['product']); ?>" />
            </div>
            <div class="col-sm-6">
                <h2 style="font-family: Times New Roman;"><?php echo htmlspecialchars($row['product']); ?></h2>
                <p style="font-size: 1.2em;">Product Owner: <?php echo htmlspecialchars($frow['fname']); ?></p>
                <p style="font-size: 1.2em;">Price: <?php echo htmlspecialchars($row['price']); ?> /-</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="font-size: 1.2em; font-family: Times New Roman;">
                <?php echo htmlspecialchars($row['pinfo']); ?>
            </div>
        </div>

        <br>
        <div class="text-center">
            <div class="row">
                <div class="col-sm-6">
                    <a href="myCart.php?flag=1&pid=<?php echo $pid; ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="buyNow.php?pid=<?php echo $pid; ?>" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>

        <br><br>
        <div class="container">
            <h3>Product Reviews</h3>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <?php
                    $sql = "SELECT * FROM review WHERE pid='$pid'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) :
                        while ($row1 = $result->fetch_array()) :
                    ?>
                    <div class="con">
                        <div class="row">
                            <div class="col-sm-6">
                                <em style="color: black;"><?php echo htmlspecialchars($row1['comment']); ?></em>
                            </div>
                            <div class="col-sm-6">
                                <em style="color: black;">Rating: <?php echo htmlspecialchars($row1['rating']); ?> out of 10</em>
                            </div>
                        </div>
                        <span class="time-right" style="color: black;">From: <?php echo htmlspecialchars($row1['name']); ?></span>
                        <br><br>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <div class="container">
            <h4>Rate this product</h4>
            <form method="POST" action="reviewInput.php?pid=<?php echo $pid; ?>">
                <div class="row">
                    <div class="col-sm-7">
                        <textarea name="comment" cols="5" placeholder="Write a review" style="background-color:white;color:black;" required></textarea>
                    </div>
                    <div class="col-sm-5">
                        <br>
                        Rating: <input type="number" min="0" max="10" name="rating" value="0" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <br>
                        <input type="submit" class="btn btn-success" value="Submit Review" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>
