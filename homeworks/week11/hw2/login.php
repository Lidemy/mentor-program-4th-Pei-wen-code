<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <div class="login_container">
            <?php 
                if (!empty($_GET['errCode'])) {
                    $code = $_GET['errCode'];
                    $msg = 'Error';
                    if ($code === '1') {
                        $msg = '資料不齊全，請重新輸入';
                        echo '<h2>錯誤：' . $msg . '</h2>';
                    } else if ($code === '2') {
                        $msg = '帳號或是密碼輸入錯誤';
                        echo '<h2>錯誤：' . $msg . '</h2>';
                    }
                }
            ?>
            <form method="POST" action="handle_login.php">
                <div>
                    <span class="username">username:</span>
                    <input name="username" />
                </div>
                <div>
                    <span class="password">password:</span>
                    <input type="password" name="password" />
                </div>
                <input type="submit" value="送出">
            </form>
        </div>
    </div>
<body>
</html>