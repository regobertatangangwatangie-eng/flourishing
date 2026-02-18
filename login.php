<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - AgroCulture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="indexfooter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
</head>
<body>

<!-- Footer with menu -->
<footer class="footer-distributed" style="background-color:black" id="aboutUs">
    <?php require 'menu4.php'; ?>
</footer>

<!-- Login Modal -->
<div id="id01" class="modal">
    <form class="modal-content animate" action="Login/login.php" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <h3>Login</h3>

            <div class="row uniform 50%">
                <div class="7u$">
                    <input type="text" name="uname" id="uname" placeholder="UserName" style="width:80%" required>
                </div>
                <div class="7u$">
                    <input type="password" name="pass" id="pass" placeholder="Password" style="width:80%" required>
                </div>
            </div>

            <div class="row uniform">
                <p><b>Category: </b></p>
                <div class="3u 12u$(small)">
                    <input type="radio" id="farmer" name="category" value="1" checked>
                    <label for="farmer">Farmer</label>
                </div>
                <div class="3u 12u$(small)">
                    <input type="radio" id="buyer" name="category" value="2">
                    <label for="buyer">Buyer</label>
                </div>
            </div>

            <center>
                <div class="row uniform">
                    <div class="7u 12u$(small)">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </center>
        </div>
    </form>
</div>

<script>
// Close modal when clicking outside
window.onclick = function(event) {
    var modal = document.getElementById('id01');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
