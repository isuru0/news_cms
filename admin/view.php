<?php
    include("templates/header.php");
?>

<div class="admin_view_post" id="admin_view_scrollbar">
    <?php
        $id = $_GET['id'];
        if (isset($_GET["id"])) {
            include("../connect.php");

            $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
            $result = mysqli_query($conn, $sqlSelectPost);
            while ($data = mysqli_fetch_array($result)) {
    ?>
                <h1 class="admin_view_h1"><?php echo $data['title']; ?></h1>
                <div class="admin_view_post_image">
                    <img src="<?php echo $data["image_path"]; ?>" >
                </div>
                <p class="admin_view_post_date"><?php echo $data['date']; ?></p>
                <p class="admin_view_post_content"><?php echo $data['content']; ?></p>

    <?php
            
            }
        }else {
            echo "No Post Found";
        }
    ?>

    <?php
        include('../connect.php');
        $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sqlSelectPost);
        while ($data = mysqli_fetch_array($result)) {
    ?>
        <div class="admin_view_post_control">
            <p class="admin_view_post_control_btn admin_view_post_control_btn_edit"><a href="edit.php?id=<?php echo $data["id"]?>">Edit</a></p>
            <p class="admin_view_post_control_btn admin_view_post_control_btn_delete"><a href="control/delete.php?id=<?php echo $data["id"]?>">Delete</a></p>
        </div>

    <?php
        }
    ?>

</div>


<?php
    include("templates/footer.php");
?>