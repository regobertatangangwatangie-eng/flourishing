<?php 
    require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmPro Navigation</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        #header a {
            color: white;
            font-size: 30px;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
        }

        #header ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
        }

        #header nav {
            background-color: #292c2f;
            padding: 15px;
        }
    </style>
</head>
<body>

<header id="header">
    <nav id="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="create.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>

</body>
</html>
