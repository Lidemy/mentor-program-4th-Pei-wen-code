<?php
    session_start();
    require_once ('conn.php');

    $username = NULL;
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    $page = 1;
    if (!empty($_GET['page'])) {
        $page = intval($_GET['page']);
    }
    $items_per_page = 8;
    $offset = ($page - 1) * $items_per_page;

    $sql = "SELECT * FROM peipei_wk11_posts WHERE is_deleted is NULL ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $items_per_page, $offset);
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
    <title>文章列表</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <ul class="for_visitor">
            <li><a href="index_blog.php">陽春部落格</a></li>
            <li><a href=#>文章列表</a></li>
            <li><a href=#>文章分類</a></li>
            <li><a href=#>關於我</a></li>
        </ul>
        <ul class="for_admin">
            <?php if ($username) { ?>
            <li><a href="add_post.php">新增文章</a></li>
            <li><a href="logout.php">登出</a></li>
            <?php } ?>
        </ul>
    </nav>

    <section class="posts">
        <?php while ($row = $result->fetch_assoc()) {?>
            <?php if ($row['is_deleted'] == NULL ) { ?>
                <div class="card_article">
                    <span><?php echo $row['title']?></span>
                    <span>
                        <span><?php echo $row['created_at']?></span>
                        <a href="single_post.php?id=<?php echo $row['id']?>">READ MORE</a>
                    </span>
                </div>
            <?php } ?>
        <?php } ?>
    </section>

    <section class="page_wrapper">
        <div class="dividen"></div>
            <?php
                $stmt = $conn->prepare(
                    'SELECT count(id) as count FROM peipei_wk11_posts WHERE is_deleted IS NULL'
                );
                $result = $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $count = $row['count'];
                $total_page = ceil($count / $items_per_page);
            ?>
            <div class="page_info">
                <span>總共有 <?php echo $count; ?> 筆留言，頁數：</span>
                <span><?php echo $page; ?> / <?php echo $total_page; ?></span>
            </div>
            <div class="pagenator">
                <?php if ($page != 1) { ?>
                    <a href="article_list.php?page=1">首頁</a>
                    <a href="article_list.php?page=<?php echo $page - 1; ?>">上一頁</a>
                <?php } ?>
                <?php if ($page != $total_page) { ?>
                    <a href="article_list.php?page=<?php echo $page + 1; ?>">下一頁</a>
                    <a href="article_list.php?page=<?php echo $total_page; ?>">最後一頁</a>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>