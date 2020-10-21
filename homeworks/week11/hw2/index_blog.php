<?php
    session_start();
    require_once ('conn.php');
    require_once ('utils.php');

    $username = NULL;
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    $page = 1;
    if (!empty($_GET['page'])) {
        $page = intval($_GET['page']);
    }
    $items_per_page = 5;
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
    <title>陽春部落格</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once ('blog_nav.php'); ?>
    <section class="banner">
        <h1>第十一週作業<h1>
    </section>

    <section class="posts">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <?php if ($row['is_deleted'] == NULL ) { ?>
                <div class="card">
                    <div class="head">
                        <span><?php echo escape($row['title']); ?></span>
                        <?php if ($username) { ?>
                            <span><a href="update_post.php?id=<?php echo $row['id']; ?>">編輯</a></span>
                        <?php } ?>
                    </div>
                    <div class="date"><?php echo $row['created_at']?></div>
                    <div class="pre_reading"><?php echo substr(escape($row['content']), 0, 500); ?></div>
                    <a href="single_post.php?id=<?php echo $row['id']?>">READ MORE</a>
                </div>
            <?php } ?>
        <?php } ?>
    </section>

    <?php if ($username) { ?>
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
                    <a href="index_blog.php?page=1">首頁</a>
                    <a href="index_blog.php?page=<?php echo $page - 1; ?>">上一頁</a>
                <?php } ?>
                <?php if ($page != $total_page) { ?>
                    <a href="index_blog.php?page=<?php echo $page + 1; ?>">下一頁</a>
                    <a href="index_blog.php?page=<?php echo $total_page; ?>">最後一頁</a>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>
</body>
</html>