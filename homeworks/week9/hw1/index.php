<?php
    session_start(); 
    require_once('conn.php'); 
    require_once('utils.php');

    // $username= NULL;
    // if (!empty($_COOKIE['token'])) {
    //     $user = getUserFromToken($_COOKIE['token']);
    //     $username = $user['username'];
    // }
    $username = NULL;
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    /*
       1. 從 cookie 裡面讀取 phpsessid (token)
       2. 從檔案裡面讀取 session id 的內容
       3. 放到 ＄_session
     */

    $result = $conn->query('SELECT * FROM peipei_comments ORDER BY id DESC');
    if (!$result) {
        die('Error' . $conn->error);
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Post 留言板</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="warning">
        <strong>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼！</strong>
    </header>

    <main class="board">
        <section class="form_container">
            <div class="form_head">
                <?php if (!$username) { ?>
                    <a class="member_btn" href="register.php">註冊</a>
                    <a class="member_btn" href="login.php">登入</a>
                <?php } else { ?>
                    <a class="member_btn" href="logout.php">登出</a>
                <?php }?>
                <h1>Comments</h1>
                    <?php
                        if (!empty($_GET['errCode'])) {
                            $code = $_GET['errCode'];
                            $msg = 'Erro';
                            if ($code === '1') {
                                $msg = '資料不齊全';
                            }
                            echo '<h2>錯誤：' . $msg . '</h2>';
                        }
                    ?>
            </div>
            <div class="form_body">
                <form method="POST" action="handle_add_post.php">
                    <!-- <span>暱稱</span>
                    <input class="form_body_nickname" type="text" name="nickname" /> -->
                    <textarea class="form_body_content" rows="5" name="content" placeholder="請輸入您的留言"></textarea>
                    <?php if ($username) { ?>
                    <input class="form_body_btn"type="submit" value="送出" />
                    <?php } else {?>
                        <h3>請登入發布留言</h3>
                    <?php }?>
                </form>
                <div class="form_hr"></div>
            </div>
        </section>

        <section class="posts_container">
            <?php
                while ($row = $result->fetch_assoc()) {
            ?>
                <div class="posts">
                    <div class="posts_avatar"></div>
                    <div class="posts_info">
                        <div class="info_upper">
                            <span class="info_upper_nickname"><?php echo $row['nickname']; ?></span>
                            <span class="info_upper_time"><?php echo $row['created_at']; ?></span>
                        </div>
                        <p class="info_lower"><?php echo $row['content']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </section>
    </main>
</body>
</html>