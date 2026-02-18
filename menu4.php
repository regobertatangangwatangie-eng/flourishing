<?php 
    require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FarmPro Header</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        #header nav {
            background-color: #292c2f;
            padding: 15px;
        }

        #header ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 10px;
        }

        #header ul li a {
            color: white;
            font-size: 30px;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
        }
    </style>
</head>
<body>

<header id="header">
    <nav id="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
</header>

</body>
</html>
