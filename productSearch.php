<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="indexFooter.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
</head>
<body class="landing">

    <!-- Header -->
    <header id="header">
        <nav id="nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="generic.html">Generic</a></li>
                <li><a href="elements.html">Elements</a></li>
                <li><a href="elements.html">Blog</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Section -->
    <section id="one" class="wrapper style1 align-center">
        <div class="container">
            <header>
                <h2>Welcome to Digital Market</h2>
            </header>

            <section id="two" class="wrapper style2 align-center">
                <div class="container">
                    <form method="post" action="#">
                        <div class="row uniform 50%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="text" name="pname" id="pname" placeholder="Search" style="background-color:white;color:black;" />
                            </div>
                            <div class="col-4">
                                <ul class="actions">
                                    <li><input type="submit" value="Go!" class="special" /></li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <h2 style="font-size:120%;">Search by Following Categories:</h2>
                            </div>
                            <div class="col-12"><br></div>

                            <div class="col-4">
                                <input type="radio" id="priority-low" name="priority" checked>
                                <label for="priority-low"><h2 style="font-size:120%;">Grains</h2></label>
                            </div>
                            <div class="col-4">
                                <input type="radio" id="priority-normal" name="priority">
                                <label for="priority-normal"><h2 style="font-size:120%;">Fruits</h2></label>
                            </div>
                            <div class="col-4">
                                <input type="radio" id="priority-high" name="priority">
                                <label for="priority-high"><h2 style="font-size:120%;">Vegetables</h2></label>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-distributed" style="background-color:black" id="aboutUs">
        <center>
            <h1 style="font-size:35px;">About Us</h1>
        </center>

        <div class="footer-left">
            <h3 style="font-family: 'Times New Roman', cursive;">ART CIRCLE &copy;</h3>
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" width="200px" alt="Art Circle Logo"></a>
            </div>
            <p style="font-size:20px;color:white;">Art is God <br>& we are devotees !!!</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p style="font-size:20px">Walchand College Of Engineering<span>Sangli 416 415</span></p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p style="font-size:20px">9765106359</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p style="font-size:20px">
                    <a href="mailto:artistkattawce@gmail.com" style="color:white">artistkattawce@gmail.com</a>
                </p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-company-about" style="color:white">
                <span style="font-size:20px;"><b>About ART CIRCLE</b></span>
                Art Circle is a club established by the students of Walchand College of Engineering, Sangli
                to nurture art in various forms.
            </p>
            <div class="footer-icons">
                <a href="https://www.facebook.com/wceartcircle/"><i class="fa fa-facebook" style="margin-left:0;margin-top:5px;"></i></a>
                <a href="https://www.instagram.com/wce_artcircle/?hl=en"><i class="fa fa-instagram" style="margin-left:0;margin-top:5px;"></i></a>
                <a href="https://www.youtube.com/channel/UCwyXHtmyoQI5EXKEBp2NaIQ"><i class="fa fa-youtube" style="margin-left:0;margin-top:5px;"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
