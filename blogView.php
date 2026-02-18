<?php
declare(strict_types=1);

session_start();
require_once 'db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 1) {
    $_SESSION['message'] = "You need to login first.";
    header("Location: Login/error.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Handle Comment Submission
    if (!empty($_POST['comment'])) {

        $comment = trim($_POST['comment']);
        $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

        $blogId = null;

        foreach ($_POST as $key => $value) {
            if (strpos($key, 'submit') === 0) {
                $blogId = (int) str_replace('submit', '', $key);
                break;
            }
        }

        if ($blogId) {
            $commentUser = $_SESSION['Username'] ?? 'Anonymous';
            $pic = $_SESSION['picName'] ?? 'profile0.png';

            $stmt = $conn->prepare(
                "INSERT INTO blogfeedback (blogId, comment, commentUser, commentPic)
                 VALUES (?, ?, ?, ?)"
            );
            $stmt->bind_param("isss", $blogId, $comment, $commentUser, $pic);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Handle Like Submission
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'like') === 0) {
            $blogId = (int) str_replace('like', '', $key);
            $userId = (int) $_SESSION['id'];

            $stmt = $conn->prepare(
                "SELECT id FROM likedata WHERE blogId = ? AND blogUserId = ?"
            );
            $stmt->bind_param("ii", $blogId, $userId);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 0) {
                $insert = $conn->prepare(
                    "INSERT INTO likedata (blogId, blogUserId) VALUES (?, ?)"
                );
                $insert->bind_param("ii", $blogId, $userId);
                $insert->execute();
                $insert->close();

                $update = $conn->prepare(
                    "UPDATE blogdata SET likes = likes + 1 WHERE blogId = ?"
                );
                $update->bind_param("i", $blogId);
                $update->execute();
                $update->close();
            }

            $stmt->close();
            break;
        }
    }
}

// Fetch blogs safely
$stmt = $conn->prepare("SELECT * FROM blogdata ORDER BY blogId DESC");
$stmt->execute();
$result = $stmt->get_result();

function formatDate(string $date): string {
    return date('g:i a', strtotime($date));
}
?>
