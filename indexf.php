<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmPro Banner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Stylesheets -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css"/>
    <link rel="stylesheet" href="indexfooter.css" />
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
</head>
<body>

<?php require 'menu3.php'; ?>

<!-- Banner Section -->
<section id="banner" class="wrapper">
    <div class="container text-center">
        <h2 style="font-size:30px">Welcome to FarmPro</h2>
        <p>Connecting Farmers and Buyers</p>
        <br><br>
        <div class="row uniform">
            <div class="6u 12u$(xsmall)">
                <!-- Optional content for left side -->
            </div>
            <div class="6u 12u$(xsmall)">
                <!-- Optional content for right side -->
            </div>
        </div>
    </div>
</section>

<!-- Modal Scripts -->
<script>
// Handle closing of modals
window.onclick = function(event) {
    const modalLogin = document.getElementById('id01');
    const modalSignup = document.getElementById('id02');
    if (event.target === modalLogin) modalLogin.style.display = 'none';
    if (event.target === modalSignup) modalSignup.style.display = 'none';
};
</script>

</body>
</html>
