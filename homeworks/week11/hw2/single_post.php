<?php
    session_start();
    require_once ('conn.php');
    require_once ('utils.php');

    if (empty($_GET['id'])) {
        die();
    }

    $id = intval($_GET['id']);
    $username = NULL;
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    $stmt = $conn->prepare("SELECT * FROM peipei_wk11_posts WHERE id=?");
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>單篇文章</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <ul class="for_visitor">
            <li class="link"><a href="index_blog.php">陽春部落格</a></li>
            <li class="link"><a href="article_list.php">文章列表</a></li>
            <li class="link"><a href=#>文章分類</a></li>
            <li class="link"><a href=#>關於我</a></li>
        </ul>
        <ul class="for_admin">
            <?php if ($username) { ?>
                <li><a href="admin.php">管理後台</a></li>
                <li><a href="logout.php">登出</a></li>
            <?php } ?>
        </ul>
    </nav>

    <section class="posts">
        <div class="real_card">
            <div class="head">
                <span><?php echo $row['title']?></span>
                <?php if ($username) { ?>
                    <span><a href="update_post.php?id=<?php echo $row['id']; ?>">編輯</a></span>
                <?php } ?>
            </div>
            <div class="date"><?php echo $row['created_at']?></div>
            <div class="real_reading"><?php echo escape($row['content']); ?></div>
        </div>
    </section>
</body>
</html>