<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headline Hub</title>
    <link rel="stylesheet" href="styles/index_style.css">
</head>
<body>
    <div class="background">
        <div class="home_area">

            <h1>HEADLINE HUB</h1>

            <form class="search">
                <input class="searchTerm" type="search" placeholder="Type anything..."/>
                <button type="submit" class="searchButton">Search</button>    
            </form>

            <div class="post-list">
                <div class="container" id="scrollbar">
                    <?php
                        include("connect.php");
                        $sqlSelect = "SELECT * FROM posts";
                        $result = mysqli_query($conn, $sqlSelect);
                        while ($data = mysqli_fetch_array($result)) {

                            //LIMIT THE CONTENT TO 100 CHARACTER FOR THE SUMMARY
                            $summaryContent = substr($data["content"], 0, 202) . '...';
                    ?>
                        <div class="summary-post">
                            <div class="left">
                                <div>
                                    <img src="admin/<?php echo $data["image_path"]; ?>" style="width:100px" >
                                </div>
                            </div>

                            <div class="right">
                                <div>
                                    <h2><?php echo $data["title"]; ?></h2>
                                </div>
                                <div>
                                    <p class="date"><?php echo $data["date"]; ?></p>
                                </div>
                                <div class="summary-content-box">
                                    <p" class="summary_content"><?php echo $summaryContent ?></p>
                                </div>
                                <div>
                                    <p class="readMore"><a href="news_post.php?id=<?php echo $data['id']; ?>">READ MORE</a></p>
                                </div>
                            </div>
                        </div>

                        <?php    
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>