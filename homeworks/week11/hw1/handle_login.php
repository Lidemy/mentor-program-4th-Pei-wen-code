<?php
    session_start();
    require_once ('conn.php');
    require_once ('utils.php');

    if (empty($_POST['username']) || empty($_POST['password'])) {
        header('Location: register.php?errCode=1');
        die();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM peipei_users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $result = $stmt->execute();
    
    if (!$result) {
        die($conn->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        header("Location: login.php?errCode=3");
        exit();
    }

    //有查到使用者
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
    //建立 token 並儲存(每次登入成功都會產生一組token??)

        // $token = generateToken();
        // $sql = sprintf(
        //     "INSERT into tokens(token, username) values('%s', '%s')",
        //     $token,
        //     $username
        // );
        // $result = $conn->query($sql);
        // if (!$result) {
        //     die($conn->error);
        // }

        // $expire = time() + 3600 * 24 * 30;
        // setcookie('token', $token, $expire);
        $_SESSION['username'] = $username;
        // 1. 產生 session_id (token) , 就是做那個 generateToken()這件事
        // 2. 把 username 寫入檔案
        // 3. set-cookie: session-id
        header('Location: index.php');
    } else {
        header('Location: login.php?errCode=3');
    }
?>
