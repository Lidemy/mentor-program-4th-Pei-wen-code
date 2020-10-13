<?php
    session_start();
    require_once('conn.php');

    $page = $_POST['page'];

    if (empty($_POST['title']) || empty($_POST['content'])) {
        header('Location: ' . $page);
        die();
    }

    $username = $_SESSION['username'];
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE peipei_wk11_posts SET title=?, content=? WHERE id=? AND username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssis', $title, $content, $id, $username);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    header('Location: ' . $page);
?>