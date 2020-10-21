<?php
    session_start();
    require_once ('conn.php');

    if (empty($_POST['title']) || empty($_POST['content'])) {
        header('Location: add_post.php?errCode=1');
        die();
    }
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO peipei_wk11_posts(username, title, content) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $title, $content);
    $result = $stmt->execute();

    if(!$result) {
        die($conn->error);
    } else {
        $_SESSION['username'] = $username;
        header('Location: admin.php');
    }
?>