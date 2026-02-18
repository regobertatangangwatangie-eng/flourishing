<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You have to Login to view this page!";
    header("Location: Login/error.php");
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile: <?php echo htmlspecialchars($_SESSION['Username']); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom CSS & JS -->
    <link rel="stylesheet" href="login.css"/>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>

    <?php require 'menu.php'; ?>

    <section id="one" class="wrapper style1 align-center">
        <div class="inner">
            <div class="box">
                <header>
                    <center>
                        <img src="<?php echo 'images/profileImages/' . htmlspecialchars($_SESSION['picName']) . '?' . mt_rand(); ?>" 
                             class="img-circle img-responsive" height="200" alt="Profile Picture">
                        <br>
                        <h2><?php echo htmlspecialchars($_SESSION['Name']); ?></h2>
                        <h4 style="color: black;"><?php echo htmlspecialchars($_SESSION['Username']); ?></h4>
                        <br>
                    </center>
                </header>

                <div class="row text-center">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <b style="font-size: 1.2em; color:black;">RATINGS:</b> 
                        <span style="font-size: 1.2em;"><?php echo htmlspecialchars($_SESSION['Rating']); ?></span>
                    </div>
                    <div class="col-sm-3">
                        <b style="font-size: 1.2em; color:black;">Email ID:</b> 
                        <span style="font-size: 1.2em;"><?php echo htmlspecialchars($_SESSION['Email']); ?></span>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <br>

                <div class="row text-center">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <b style="font-size: 1.2em; color:black;">Mobile No:</b> 
                        <span style="font-size: 1.2em;"><?php echo htmlspecialchars($_SESSION['Mobile']); ?></span>
                    </div>
                    <div class="col-sm-3">
                        <b style="font-size: 1.2em; color:black;">ADDRESS:</b> 
                        <span style="font-size: 1.2em;"><?php echo htmlspecialchars($_SESSION['Addr']); ?></span>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
