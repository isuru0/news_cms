<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="stylesheet" href="styles/news_post_style.css">
</head>
<body>
    <div class="background">
        <main class="home_area">
            <div class="container" id="scrollbar">
                <a class="back-link" href="index.php">Back to Headlines</a>
                <?php
                    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
                    $post = null;

                    if ($id > 0) {
                        include("connect.php");
                        $sqlSelect = "SELECT * FROM posts WHERE id = $id";
                        $result = mysqli_query($conn, $sqlSelect);
                        $post = mysqli_fetch_assoc($result);
                    }

                    if ($post) {
                        $rawImagePath = ltrim($post["image_path"], "/");
                        $imageSrc = (strpos($rawImagePath, "admin/") === 0) ? $rawImagePath : "admin/" . $rawImagePath;
                ?>
                <article class="post">
                    <h1 class="title"><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p class="date"><?php echo htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?></p>

                    <div class="image">
                        <img src="<?php echo $imageSrc; ?>" alt="Post image">
                    </div>

                    <div class="summary_content_box">
                        <p class="summary_content"><?php echo nl2br(htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8')); ?></p>
                    </div>
                </article>
                <?php
                    } else {
                ?>
                <div class="empty-state">No Post Found</div>
                <?php
                    }
                ?>
            </div>
        </main>
    </div>
</body>
</html>