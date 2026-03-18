<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headline Hub</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="stylesheet" href="styles/index_style.css">
</head>
<body>
    <div class="background">
        <div class="home_area">

            <h1>HEADLINE HUB</h1>

            <form class="search" method="get" action="index.php">
                <input class="searchTerm" type="search" name="q" placeholder="Type anything..." value="<?php echo htmlspecialchars(isset($_GET['q']) ? trim($_GET['q']) : '', ENT_QUOTES, 'UTF-8'); ?>"/>
                <button type="submit" class="searchButton">Search</button>    
            </form>

            <div class="post-list">
                <div class="container" id="scrollbar">
                    <?php
                        include("connect.php");
                        $keyword = isset($_GET['q']) ? trim($_GET['q']) : '';

                        if ($keyword !== '') {
                            $sqlSelect = "SELECT * FROM posts WHERE title LIKE ? OR content LIKE ? ORDER BY id DESC";
                            $stmt = mysqli_prepare($conn, $sqlSelect);
                            $searchParam = "%" . $keyword . "%";
                            mysqli_stmt_bind_param($stmt, "ss", $searchParam, $searchParam);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                        } else {
                            $sqlSelect = "SELECT * FROM posts ORDER BY id DESC";
                            $result = mysqli_query($conn, $sqlSelect);
                        }

                        if ($result && mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_array($result)) {

                            // Strip HTML from content before trimming to avoid broken card markup.
                            $plainContent = trim(strip_tags($data["content"]));
                            $summaryContent = (strlen($plainContent) > 220) ? substr($plainContent, 0, 220) . '...' : $plainContent;
                            $rawImagePath = ltrim($data["image_path"], "/");
                            $imageSrc = (strpos($rawImagePath, "admin/") === 0) ? $rawImagePath : "admin/" . $rawImagePath;
                    ?>
                        <div class="summary-post">
                            <div class="left">
                                <div>
                                    <img src="<?php echo $imageSrc; ?>" >
                                </div>
                            </div>
                            <div class="right">
                                <div>
                                    <h2><?php echo htmlspecialchars($data["title"], ENT_QUOTES, 'UTF-8'); ?></h2>
                                </div>
                                <div>
                                    <p class="date"><?php echo htmlspecialchars($data["date"], ENT_QUOTES, 'UTF-8'); ?></p>
                                </div>
                                <div class="summary-content-box">
                                    <p class="summary_content"><?php echo htmlspecialchars($summaryContent, ENT_QUOTES, 'UTF-8'); ?></p>
                                </div>
                                <div>
                                    <p class="readMore"><a href="news_post.php?id=<?php echo $data['id']; ?>">READ MORE</a></p>
                                </div>
                            </div>
                        </div>

                        <?php    
                        }
                        } else {
                    ?>
                        <div class="summary-post">
                            <div class="right" style="width:100%;">
                                <h2>No matching posts found</h2>
                                <p class="summary_content">Try a different keyword.</p>
                            </div>
                        </div>
                    <?php
                        }

                        if (isset($stmt) && $stmt) {
                            mysqli_stmt_close($stmt);
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>