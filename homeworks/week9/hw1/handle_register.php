<?php
    require_once ('conn.php');
// 3. 若post送來的username什麼都沒有，就執行die
    if (empty($_POST['username']) || empty($_POST['nickname']) || empty($_POST['password'])) {
        header('Location: register.php?errCode=1');
        die();
    }
// 4. 若有，就新增資料到資料庫
    $nickname = $_POST['nickname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = sprintf(
        "INSERT INTO peipei_users(nickname, username, password) values ('%s', '%s', '%s')",
        $nickname,
        $username,
        $password
    );

    $result = $conn->query($sql);

// 如果拿不到新增以後的結果（就是新增失敗），那就die
    if (!$result) {//如果result為空
        if (strpos($conn->error, "Duplicate entry") !== false) {
            header('Location: register.php?errCode=2');
        }
        die($conn->error);
    }
// 不然就是跳轉回表單頁面

    header('Location: index.php');
?>
