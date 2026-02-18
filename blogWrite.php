<?php
declare(strict_types=1);

session_start();

// Protect page (only logged-in users can write blog)
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 1) {
    header("Location: ../Login/error.php");
    exit;
}

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AgroCulture : Write a Blog</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Use forward slashes for compatibility -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />

    <script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
</head>

<body class="subpage">

<?php require_once 'menu.php'; ?>

<form method="post" action="Blog/blogSubmit.php">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

    <section id="main" class="wrapper">
        <div class="inner">
            <div class="container" style="width: 70%">

                <div class="row uniform">
                    <div class="9u 12u$(small)"></div>
                    <div class="3u 12u$(small)">
                        <a href="blogView.php" class="button special fit">View Blogs</a>
                    </div>
                </div>

                <br />

                <div class="box">
                    <div class="row uniform">

                        <div class="12u$">
                            <input
                                type="text"
                                name="blogTitle"
                                id="blogTitle"
                                placeholder="Blog Title"
                                required
                            />
                        </div>

                        <div class="12u$">
                            <textarea
                                name="blogContent"
                                id="blogContent"
                                rows="12"
                                placeholder="Blog Content"
                                required
                            ></textarea>
                        </div>

                        <div class="12u$ text-center">
                            <br>
                            <input
                                type="submit"
                                name="submit"
                                class="button special"
                                value="SUBMIT"
                            />
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</form>

<script>
    CKEDITOR.replace('blogContent');
</script>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>

