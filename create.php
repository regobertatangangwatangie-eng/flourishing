<?php
declare(strict_types=1);

session_start();

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroCulture - Sign Up</title>

    <!-- Use forward slashes -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="indexfooter.css">

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>

<body>

<?php require_once 'menu4.php'; ?>

<section class="container" style="max-width:600px; margin:40px auto;">
    <h3 class="text-center">Sign Up</h3>

    <form method="POST" action="Login/signUp.php">

        <!-- CSRF -->
        <input type="hidden" name="csrf_token"
               value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

        <div class="form-group">
            <input type="text" name="name" class="form-control"
                   placeholder="Name" required>
        </div>

        <div class="form-group">
            <input type="text" name="uname" class="form-control"
                   placeholder="Username" required>
        </div>

        <div class="form-group">
            <input type="text" name="mobile" class="form-control"
                   placeholder="Mobile Number" required>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control"
                   placeholder="Email" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control"
                   placeholder="Password" required>
        </div>

        <div class="form-group">
            <input type="password" name="pass" class="form-control"
                   placeholder="Retype Password" required>
        </div>

        <div class="form-group">
            <input type="text" name="addr" class="form-control"
                   placeholder="Address" required>
        </div>

        <div class="form-group">
            <label><strong>Category:</strong></label><br>
            <input type="radio" id="farmer" name="category" value="1" checked>
            <label for="farmer">Farmer</label>

            <input type="radio" id="buyer" name="category" value="2">
            <label for="buyer">Buyer</label>
        </div>

        <div class="text-center">
            <input type="submit" name="submit"
                   value="Submit"
                   class="btn btn-success">
        </div>

    </form>
</section>

<footer class="footer-distributed" style="background-color:black;">
</footer>

</body>
</html>
