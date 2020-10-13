<?php 
    require_once('conn.php'); 
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>會員登入</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="warning">
        <strong>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼！</strong>
    </header>

    <main class="board">
        <section class="form_container">
            <div class="form_head">
                <a class="member_btn" href="index.php">回留言板</a>
                <a class="member_btn" href="register.php">註冊</a>
                <h1>會員登入</h1>
                    <?php
                        if (!empty($_GET['errCode'])) {
                            $code = $_GET['errCode'];
                            $msg = 'Erro';
                            if ($code === '1') {
                                $msg = '資料不齊全';
                            } else if ($code === '2') {
                                $msg = '帳號已被註冊';
                            } else if ($code === '3') {
                                $msg = '帳號或是密碼輸入錯誤';
                            }
                            echo '<h2>錯誤：' . $msg . '</h2>';
                        }
                    ?>
            </div>
            <div class="form_body">
                <form method="POST" action="handle_login.php">
                    <span>帳號</span>
                    <input class="form_body_username" type="text" name="username" />
                    <span>密碼</span>
                    <input class="form_body_password" type="password" name="password" />
                    <input class="form_body_btn"type="submit" value="送出" />
                </form>
            </div>
        </section>
    </main>
</body>
</html>