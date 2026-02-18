<?php
session_start();
require 'db.php';

// Validate input
if (!isset($_SESSION['Name'])) {
    die("You must be logged in to submit a review.");
}

if (!isset($_GET['pid']) || !is_numeric($_GET['pid'])) {
    die("Invalid product ID.");
}

if (!isset($_POST['rating'], $_POST['comment'])) {
    die("Rating and comment are required.");
}

$pid = (int)$_GET['pid'];
$rating = (int)$_POST['rating'];
$review = trim($_POST['comment']);
$name = $_SESSION['Name'];

// Escape input for SQL
$rating = mysqli_real_escape_string($conn, $rating);
$review = mysqli_real_escape_string($conn, $review);
$name = mysqli_real_escape_string($conn, $name);

// Insert review
$sql = "INSERT INTO review (pid, name, rating, comment) VALUES ('$pid', '$name', '$rating', '$review')";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database error: " . mysqli_error($conn));
} else {
    header("Location: review.php?pid=" . $pid);
    exit();
}
?>
