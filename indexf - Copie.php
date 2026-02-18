<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture</title>
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

<?php require 'menu.php'; ?>

<!-- Banner -->
<section id="banner" class="wrapper">
    <div class="container text-center">
        <h2>AgroCulture</h2>
        <p>Your Product Our Market</p>
        <br><br>
        <div class="row uniform">
            <div class="6u 12u$(xsmall)">
                <button class="button fit" onclick="document.getElementById('id01').style.display='block'" style="width:auto">LOGIN</button>
            </div>
            <div class="6u 12u$(xsmall)">
                <button class="button fit" onclick="document.getElementById('id02').style.display='block'" style="width:auto">REGISTER</button>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section id="one" class="wrapper style1 align-center">
    <div class="container">
        <header>
            <h2>AgroCulture</h2>
            <p>Explore the new way of trading...</p>
        </header>
        <div class="row 200%">
            <section class="4u 12u$(small)">
                <i class="icon big rounded fa-clock-o"></i>
                <p>Digital Market</p>
            </section>
            <section class="4u 12u$(small)">
                <i class="icon big rounded fa-comments"></i>
                <p>Agro-Blog</p>
            </section>
            <section class="4u$ 12u$(small)">
                <i class="icon big rounded fa-user"></i>
                <p>Register with us</p>
            </section>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer-distributed" style="background-color:black" id="aboutUs">
    <center>
        <h1 style="font: 35px calibri;">About Us</h1>
    </center>
    <div class="footer-left">
        <h3 style="font-family: 'Times New Roman', cursive;">AgroCulture &copy;</h3>
        <p style="font-size:20px;color:white">Your product, Our market!</p>
    </div>
    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p style="font-size:20px">Agro Culture Fam <span>Vormir</span></p>
        </div>
        <div>
            <i class="fa fa-phone"></i>
            <p style="font-size:20px">123456789</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p style="font-size:20px"><a href="mailto:demo@demo.com" style="color:white">demo@demo.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about" style="color:white">
            <span style="font-size:20px"><b>About AgroCulture</b></span>
            AgroCulture is an e-commerce trading platform for grains & groceries...
        </p>
        <div class="footer-icons">
            <a href="#"><i class="fa fa-facebook" style="margin:5px 0 0 0;"></i></a>
            <a href="#"><i class="fa fa-instagram" style="margin:5px 0 0 0;"></i></a>
            <a href="#"><i class="fa fa-youtube" style="margin:5px 0 0 0;"></i></a>
        </div>
    </div>
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
                    <input type="text" name="uname" placeholder="UserName" style="width:80%" required/>
                </div>
                <div class="7u$">
                    <input type="password" name="pass" placeholder="Password" style="width:80%" required/>
                </div>
            </div>
            <div class="row uniform">
                <p><b>Category:</b></p>
                <div class="3u 12u$(small)">
                    <input type="radio" id="farmer" name="category" value="farmer" checked>
                    <label for="farmer">Farmer</label>
                </div>
                <div class="3u 12u$(small)">
                    <input type="radio" id="buyer" name="category" value="buyer">
                    <label for="buyer">Buyer</label>
                </div>
            </div>
            <center>
                <div class="row uniform">
                    <div class="7u 12u$(small)">
                        <input type="submit" value="Login" />
                    </div>
                </div>
            </center>
        </div>
    </form>
</div>

<!-- Signup Modal -->
<div id="id02" class="modal">
    <form class="modal-content animate" action="Login/signUp.php" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="container">
            <h3>SignUp</h3>
            <div class="row uniform">
                <div class="3u 12u$(xsmall)">
                    <input type="text" name="name" placeholder="Name" required/>
                </div>
                <div class="3u 12u$(xsmall)">
                    <input type="text" name="uname" placeholder="UserName" required/>
                </div>
            </div>
            <div class="row uniform">
                <div class="3u 12u$(xsmall)">
                    <input type="text" name="mobile" placeholder="Mobile Number" required/>
                </div>
                <div class="3u 12u$(xsmall)">
                    <input type="email" name="email" placeholder="Email" required/>
                </div>
            </div>
            <div class="row uniform">
                <div class="3u 12u$(xsmall)">
                    <input type="password" name="password" placeholder="Password" required/>
                </div>
                <div class="3u 12u$(xsmall)">
                    <input type="password" name="pass" placeholder="Retype Password" required/>
                </div>
            </div>
            <div class="row uniform">
                <div class="6u 12u$(xsmall)">
                    <input type="text" name="addr" placeholder="Address" style="width:80%" required/>
                </div>
            </div>
            <div class="row uniform">
                <p><b>Category:</b></p>
                <div class="3u 12u$(small)">
                    <input type="radio" id="farmer2" name="category" value="farmer" checked>
                    <label for="farmer2">Farmer</label>
                </div>
                <div class="3u 12u$(small)">
                    <input type="radio" id="buyer2" name="category" value="buyer">
                    <label for="buyer2">Buyer</label>
                </div>
            </div>
            <div class="row uniform">
                <div class="3u 12u$(small)">
                    <input type="submit" value="Submit" name="submit" class="special" />
                </div>
                <div class="3u 12u$(small)">
                    <input type="reset" value="Reset" />
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Script -->
<script>
window.onclick = function(event) {
    const modalLogin = document.getElementById('id01');
    const modalSignup = document.getElementById('id02');
    if (event.target === modalLogin) modalLogin.style.display = 'none';
    if (event.target === modalSignup) modalSignup.style.display = 'none';
}
</script>

</body>
</html>
