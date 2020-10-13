<?php
    session_start();
    require_once ('conn.php');

    if (empty($_POST['username']) || empty($_POST['nickname']) || empty($_POST['password'])) {
        header('Location: register.php?errCode=1');
        die();
    }

    $username = $_POST['username'];
    $nickname = $_POST['nickname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO peipei_wk11_users(username, nickname, password) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $nickname, $password);
    $result = $stmt->execute();

    if (!$result) {
        if (strpos($conn->error, "Duplicate entry") !== false) {
            header('Location: register.php?errCode=2');
        }
        die();
    }

    $_SESSION['username'] = $username;
    header('Location: index_blog.php');

?>