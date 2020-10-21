<?php
    session_start();
    require_once('conn.php');

    if (empty($_GET['id'])) {
        header('Location: update_post.php?errCode=1');
        die();
    }

    $id = $_GET['id'];
    $username = $_SESSION['username'];

    $sql = "UPDATE peipei_wk11_posts SET is_deleted = 1 WHERE id=? AND username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $id, $username);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    header('Location: admin.php');
?>