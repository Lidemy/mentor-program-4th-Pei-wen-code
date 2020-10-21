<?php
    $uri = $_SERVER['REQUEST_URI'];
    $isAdminPage = (strpos($uri, 'admin.php') !== false);
?>

<nav class="navbar">
    <ul class="for_visitor">
        <li class="link"><a href="index_blog.php">陽春部落格</a></li>
        <li class="link"><a href="article_list.php">文章列表</a></li>
        <li class="link"><a href=#>文章分類</a></li>
        <li class="link"><a href=#>關於我</a></li>
    </ul>
    <ul class="for_admin">
        <?php if (!empty($_SESSION['username'])) { ?>
            <?php if ($isAdminPage) { ?>
                <li><a href="add_post.php">新增文章</a></li>
            <?php } else { ?>
                <li><a href="admin.php">管理後台</a></li>
            <?php } ?>
                <li><a href="logout.php">登出</a></li>
        <?php } else { ?>
                <li><a href="login.php">登入</a></li>
        <?php } ?>
    </ul>
</nav>