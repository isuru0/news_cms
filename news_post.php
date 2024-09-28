<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="styles/news_post_style.css">
</head>
<body>
    <div class="background">
        <div class="home_area">

            <div class="container" id="scrollbar">
                <?php
                    $id = $_GET['id'];
                    if ($id) {
                        include("connect.php");

                        $sqlSelect = "SELECT * FROM posts WHERE id = $id";
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($data = mysqli_fetch_array($result)) {
                ?>
                            <div class="post">
                                <h1><?php echo $data['title']; ?></h1>
                                <div class="image">
                                    <img src="admin/<?php echo $data["image_path"]; ?>" >
                                </div>
                                <p class="date"><?php echo $data['date']; ?></p>
                                <div class="summary_content_box">
                                    <p class="summary_content"><?php echo $data['content']; ?></p>
                                </div>

                            </div>
                <?php
                        }

                    }else {
                        echo "No Post Found";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>