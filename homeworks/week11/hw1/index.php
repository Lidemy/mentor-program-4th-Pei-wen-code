<?php
    session_start(); 
    require_once('conn.php'); 
    require_once('utils.php');

    $username = NULL;
    $user = NULL;
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user = getUserFromUsername($username);
    }

    $page = 1;
    if (!empty($_GET['page'])) {
        $page = intval($_GET['page']);
    }
    $items_per_page = 3;
    $offset = ($page - 1) * $items_per_page;

    $stmt = $conn->prepare(
        'SELECT '.
            'C.id as id, C.content as content, '.
            'C.created_at as created_at, U.nickname as nickname, U.username as username '.
        'FROM peipei_comments as C '.
        'LEFT JOIN peipei_users as U ON C.username = U.username '.
        'WHERE C.is_deleted IS NULL '.
        'ORDER BY C.id DESC '.
        'LIMIT ? OFFSET ? '
    );
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
                    <span class="member_btn update_nickname">編輯暱稱</span>
                    <?php if ($user && $user["roles"] === "ADMIN") { ?>
                        <a class="member_btn" href="admin_index.php">管理後台</a>
                    <?php } ?>
                    <form class="hide board_nickname-form form_body" method="POST" action="update_user.php">
                        <span>新的暱稱：</span>
                        <input class="form_body_content" type="text" name="nickname" /><br>
                        <input class="member_btn" type="submit" />
                    </form>
                    <h3>你好！<?php echo $user['nickname']; ?></h3>
                <?php } ?>

                <h1>想說什麼呢...?</h1>
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
                    <textarea class="form_body_content" rows="5" name="content" placeholder="請輸入您的留言"></textarea>
                    <?php if ($username && !hasPermission($user, "create", NULL)) { ?>
                        <h3>您已被停權</h3>
                    <?php } else if ($username) { ?>
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
                            <span class="info_upper_nickname">
                                <?php echo escape($row['nickname']); ?>
                                (@<?php echo escape($row['username']); ?>)
                            </span>
                            <span class="info_upper_time"><?php echo escape($row['created_at']); ?></span>
                            <?php if ($username) { ?>
                                <?php if (hasPermission($user, "update", $row)) { ?>
                                    <a href="update_comment.php?id=<?php echo $row['id']; ?>">編輯</a>
                                    <a href="delete_comment.php?id=<?php echo $row['id']; ?>">刪除</a>
                                <? } ?>
                            <?php }?>
                        </div>
                        <p class="info_lower"><?php echo escape($row['content']); ?></p>
                    </div>
                </div>
            <?php } ?>
        </section>
        
        <section>
            <div class="dividen"></div>
            <?php
                $stmt = $conn->prepare(
                    'SELECT count(id) as count FROM peipei_comments WHERE is_deleted IS NULL'
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
                    <a href="index.php?page=1">首頁</a>
                    <a href="index.php?page=<?php echo $page - 1; ?>">上一頁</a>
                <?php } ?>
                <?php if ($page != $total_page) { ?>
                    <a href="index.php?page=<?php echo $page + 1; ?>">下一頁</a>
                    <a href="index.php?page=<?php echo $total_page; ?>">最後一頁</a>
                <?php } ?>
            </div>
        </section>
    </main>
    <script>
    let btn = document.querySelector('.update_nickname')
    btn.addEventListener('click', function() {
        let form = document.querySelector('.board_nickname-form')
        form.classList.toggle('hide')
    })
    </script>
</body>
</html>