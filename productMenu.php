<?php 
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture: Digital Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css"/>
    <link rel="stylesheet" href="css/skel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/style-xlarge.css"/>
</head>
<body>

<?php require 'menu.php'; ?>

<!-- Main Section -->
<section id="main" class="wrapper style1 align-center">
    <div class="container">
        <h2>Welcome to Digital Market</h2>

        <?php if(isset($_GET['n']) && $_GET['n'] == 1): ?>
            <h3>Select Filter</h3>
            <form method="GET" action="productMenu.php">
                <input type="hidden" name="n" value="1"/>
                <div class="row justify-content-center">
                    <div class="col-sm-2">
                        <select name="type" id="type" required class="form-select">
                            <option value="all">List All</option>
                            <option value="fruit">Fruit</option>
                            <option value="vegetable">Vegetable</option>
                            <option value="grain">Grains</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input class="btn btn-primary" type="submit" value="Go!" />
                    </div>
                </div>
            </form>
        <?php endif; ?>

        <!-- Product Listings -->
        <section id="two" class="wrapper style2 align-center">
            <div class="container">
                <div class="row">

                <?php
                    $type = isset($_GET['type']) ? $_GET['type'] : 'all';
                    $allowed_types = ['all','fruit','vegetable','grain'];
                    if(!in_array($type, $allowed_types)) $type = 'all';

                    if($type === 'all') {
                        $sql = "SELECT * FROM fproduct";
                    } else {
                        $sql = "SELECT * FROM fproduct WHERE pcat = '".mysqli_real_escape_string($conn, ucfirst($type))."'";
                    }

                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)):
                        $picDestination = "images/productImages/".htmlspecialchars($row['pimage']);
                ?>
                    <div class="col-md-4">
                        <section>
                            <h2 class="title" style="color:black;"><?php echo htmlspecialchars($row['product']); ?></h2>
                            <a href="review.php?pid=<?php echo htmlspecialchars($row['pid']); ?>">
                                <img class="image fit" src="<?php echo $picDestination; ?>" alt="<?php echo htmlspecialchars($row['product']); ?>" style="height:220px;">
                            </a>
                            <div style="text-align: left;">
                                <blockquote>
                                    <?php 
                                        echo "Type: ".htmlspecialchars($row['pcat'])."<br>";
                                        echo "Price: ".htmlspecialchars($row['price'])." /-";
                                    ?>
                                </blockquote>
                            </div>
                        </section>
                    </div>
                <?php endwhile; ?>

                </div>
            </div>
        </section>

    </div>
</section>

</body>
</html>
