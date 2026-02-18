<?php
// Determine login state and profile info
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
    $username = htmlspecialchars($_SESSION['Username']); // escape for security
    $loginProfile = "My Profile: $username";
    $logo = "glyphicon glyphicon-user";

    if ($_SESSION['Category'] != 1) {
        $link = "Login/profile.php";
    } else {
        $link = "profileView.php";
    }
} else {
    $loginProfile = "Login";
    $link = "index.php";
    $logo = "glyphicon glyphicon-log-in";
}
?>

<header id="header">
    <h1><a href="index.php">AgroCulture</a></h1>
    <nav id="nav">
        <ul>
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="<?= $link; ?>"><span class="<?= $logo; ?>"></span> <?= $loginProfile; ?></a></li>
            <li><a href="market.php"><span class="glyphicon glyphicon-grain"></span> Digital-Market</a></li>
        </ul>
    </nav>
</header>
