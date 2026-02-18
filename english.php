<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroCulture</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Stylesheets -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="indexfooter.css">
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

<?php require 'menu1.php'; ?>

<!-- Banner Section -->
<section id="banner" class="wrapper">
    <div class="container text-center">
        <h2 style="font-size:30px;">Vendre & achetez les produits agricoles</h2>
        <h2>Sale & buy agriculture products</h2>
        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 mb-2">
                <a href="login.php" class="btn btn-primary w-100">Connect you here</a>
            </div>
            <div class="col-md-3 col-sm-6 mb-2">
                <a href="create.php" class="btn btn-success w-100">Create your account</a>
            </div>
        </div>
    </div>
</section>

<script>
// Close modals when clicking outside
function setupModalClose(modalId) {
    var modal = document.getElementById(modalId);
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Initialize modals
setupModalClose('id01');
setupModalClose('id02');
</script>

</body>
</html>
