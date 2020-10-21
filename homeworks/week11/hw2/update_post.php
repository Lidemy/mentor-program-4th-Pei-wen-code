<?php
    session_start();
    require_once ('conn.php');
    require_once ('utils.php');
    require_once ('checkPermission.php');

    $username = $_SESSION['username'];

    $id = intval($_GET['id']);

    $sql = "SELECT * FROM peipei_wk11_posts WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();

    if (!$result) {
        die('Error' . $conn->error);
    }

    $result = $stmt->get_result();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>編輯文章</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <ul class="for_visitor">
            <li><a href="index_blog.php">陽春部落格</a></li>
            <li><a href="article_list.php">文章列表</a></li>
            <li><a href=#>文章分類</a></li>
            <li><a href=#>關於我</a></li>
        </ul>
        <ul class="for_admin">
                <li><a href="admin.php">管理後台</a></li>
                <li><a href="logout.php">登出</a></li>
        </ul>
    </nav>

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
            <?php while ($row = $result->fetch_assoc()) { ?>
                <form method="POST" action="handle_update_post.php">
                    <div><span class="article_title">標題：</span><input name="title" value="<?php echo escape($row['title']); ?>" /></div>
                    <div><span class="article_content">文章內容：</span><textarea rows="5" name="content"><?php echo escape($row['content']);?></textarea></div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="hidden" name="page" value="<?php echo $_SERVER['HTTP_REFERER']?>"/>
                    <input type="submit" value="送出"/>
                </form>
            <?php } ?>
        </div>
    </section>
</body>
</html>