<?php
declare(strict_types=1);

session_start();
require_once 'db.php';

// Require login
if (!isset($_SESSION['id'])) {
    header("Location: Login/error.php");
    exit;
}

// Validate Product ID
$pid = filter_input(INPUT_GET, 'pid', FILTER_VALIDATE_INT);
if (!$pid) {
    die("Invalid product.");
}

// CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Validate CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF token");
    }

    // Sanitize & validate input
    $name = trim($_POST['name'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $pincode = trim($_POST['pincode'] ?? '');
    $addr = trim($_POST['addr'] ?? '');
    $bid = (int) $_SESSION['id'];

    if (!$name || !$city || !$mobile || !$email || !$pincode || !$addr) {
        die("All fields are required.");
    }

    // Prepared statement (Prevents SQL Injection)
    $stmt = $conn->prepare(
        "INSERT INTO transaction 
        (bid, pid, name, city, mobile, email, pincode, addr)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "iissssss",
        $bid,
        $pid,
        $name,
        $city,
        $mobile,
        $email,
        $pincode,
        $addr
    );

    if ($stmt->execute()) {
        $_SESSION['message'] = "Order Successfully placed! Thanks for shopping with us!";
        header('Location: Login/success.php');
        exit;
    } else {
        error_log($stmt->error);
        die("Order failed. Please try again.");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroCulture: Transaction</title>

    <!-- Use forward slashes -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php require_once 'menu.php'; ?>

<section class="container mt-4">
    <h2 class="text-center">Transaction Details</h2>

    <form method="post" action="buyNow.php?pid=<?= htmlspecialchars((string)$pid, ENT_QUOTES, 'UTF-8'); ?>" 
          style="border:1px solid #000; padding:15px;">

        <input type="hidden" name="csrf_token"
               value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" name="city" class="form-control" placeholder="City" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
            </div>
            <div class="col-md-6 mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <input type="text" name="pincode" class="form-control" placeholder="Pincode" required>
            </div>
            <div class="col-md-8 mb-3">
                <input type="text" name="addr" class="form-control" placeholder="Address" required>
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Confirm Order" class="btn btn-success">
        </div>
    </form>
</section>

</body>
</html>
