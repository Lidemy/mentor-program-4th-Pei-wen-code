<?php
    session_start();
    require_once ('conn.php');
    require_once ('utils.php');
// 3. 若post送來的username什麼都沒有，就執行die
    if (empty($_POST['content'])) {
        header('Location: index.php?errCode=1');
        die('資料不齊全');
    }

    $user = getUserFromUsername($_SESSION['username']);

// 4. 若有，就拿資料庫裡面，符合此 username 的 nickname
    // $username = $_COOKIE['username'];
    // $user_sql = sprintf(
    //     "SELECT nickname FROM users WHERE username='%s'"
    //     , $username);
    // $user_result = $conn->query($user_sql);
    // $row = $user_result->fetch_assoc();
    $nickname = $user['nickname'];
// 5. 若有，就新增資料到資料庫
    $content = $_POST['content'];
    $sql = sprintf(
        "INSERT INTO peipei_comments(nickname, content) values ('%s', '%s')",
        $nickname,
        $content
    );

    $result = $conn->query($sql);

// 如果拿不到新增以後的結果（就是新增失敗），那就die
    if (!$result) {//如果result為空
        die($conn->error);
    }
// 不然就是印出以下並跳轉回表單頁面
    echo '新增成功！';

    header('Location: index.php');
?>
