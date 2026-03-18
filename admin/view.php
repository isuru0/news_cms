<?php
    include("templates/header.php");
?>

<div class="admin_view_post" id="admin_view_scrollbar">
    <?php
        include('../connect.php');
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id <= 0) {
            echo "No Post Found";
        } else {
            $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
            $result = mysqli_query($conn, $sqlSelectPost);
            $data = mysqli_fetch_assoc($result);
            if (!$data) {
                echo "No Post Found";
            } else {
                $adminImagePath = ltrim($data["image_path"], "/");
                if (strpos($adminImagePath, "admin/") === 0) {
                    $adminImagePath = substr($adminImagePath, 6);
                }
    ?>
        <h1 class="admin_view_h1"><?php echo $data['title']; ?></h1>
        <div class="admin_view_post_image">
            <img src="<?php echo $adminImagePath; ?>" >
        </div>
        <p class="admin_view_post_date"><?php echo $data['date']; ?></p>
        <p class="admin_view_post_content"><?php echo $data['content']; ?></p>

        <div class="admin_view_post_control">
            <p class="admin_view_post_control_btn admin_view_post_control_btn_edit"><a href="./edit.php?id=<?php echo (int) $data["id"]?>">Edit</a></p>
            <p class="admin_view_post_control_btn admin_view_post_control_btn_delete"><a href="./control/delete.php?id=<?php echo (int) $data["id"]?>" onclick="return confirm('Delete this post?');">Delete</a></p>
        </div>

    <?php
            }
        }
    ?>

</div>


<?php
    include("templates/footer.php");
?>