<?php
    session_start();
    require_once ('conn.php');
    require_once ('utils.php');
    require_once ('checkPermission.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>新增文章</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once ('blog_nav.php'); ?>
    <section class="posts">
        <?php 
            if (!empty($_GET['errCode'])) {
                $code = $_GET['errCode'];
                $msg = 'Error';
                if ($code === '1') {
                    $msg = '資料不齊全，請重新輸入';
                }
                echo '<h2>錯誤：' . $msg . '</h2>';
            }
        ?>
        <div class="add_article">
            <form method="POST" action="handle_add_post.php">
                <div><span class="article_title">標題：</span><input name="title"/></div>
                <div><span class="article_content">文章內容：</span><textarea rows="5" name="content"></textarea></div>
                <input type="submit" value="送出"/>
            </form>
        </div>
    </section>
</body>
</html>