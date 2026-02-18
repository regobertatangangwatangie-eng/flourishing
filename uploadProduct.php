<?php
session_start();
require 'db.php';

function dataFilter($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['id'])) {
        $_SESSION['message'] = "You must be logged in to upload a product.";
        header("Location: Login/error.php");
        exit();
    }

    $fid = (int)$_SESSION['id'];
    $productType = $_POST['type'] ?? '';
    $productName = dataFilter($_POST['pname'] ?? '');
    $productInfo = $_POST['pinfo'] ?? '';
    $productPrice = dataFilter($_POST['price'] ?? '');

    // Basic validation
    if (empty($productType) || empty($productName) || empty($productPrice)) {
        $_SESSION['message'] = "Please fill all required fields!";
        header("Location: Login/error.php");
        exit();
    }

    // Escape inputs for SQL
    $productName = mysqli_real_escape_string($conn, $productName);
    $productType = mysqli_real_escape_string($conn, $productType);
    $productInfo = mysqli_real_escape_string($conn, $productInfo);
    $productPrice = mysqli_real_escape_string($conn, $productPrice);

    // Insert product
    $sql = "INSERT INTO fproduct (fid, product, pcat, pinfo, price) 
            VALUES ('$fid', '$productName', '$productType', '$productInfo', '$productPrice')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $_SESSION['message'] = "Unable to upload Product: " . mysqli_error($conn);
        header("Location: Login/error.php");
        exit();
    }

    // Handle file upload
    if (isset($_FILES['productPic']) && $_FILES['productPic']['error'] === 0) {
        $pic = $_FILES['productPic'];
        $picName = $pic['name'];
        $picTmpName = $pic['tmp_name'];
        $picExt = strtolower(pathinfo($picName, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png'];

        if (!in_array($picExt, $allowed)) {
            $_SESSION['message'] = "Invalid file type. Allowed: jpg, jpeg, png.";
            header("Location: Login/error.php");
            exit();
        }

        $picNameNew = $productName . $fid . "." . $picExt;
        $picDestination = "images/productImages/" . $picNameNew;

        if (move_uploaded_file($picTmpName, $picDestination)) {
            $sql = "UPDATE fproduct SET picStatus=1, pimage='$picNameNew' WHERE product='$productName' AND fid='$fid'";
            if (!mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "Error updating product image: " . mysqli_error($conn);
                header("Location: Login/error.php");
                exit();
            }
            $_SESSION['message'] = "Product uploaded successfully!";
            header("Location: market.php");
            exit();
        } else {
            $_SESSION['message'] = "Failed to upload image. Try again!";
            header("Location: Login/error.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Product uploaded without an image!";
        header("Location: market.php");
        exit();
    }
}
?>
