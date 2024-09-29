<?php
    include("templates/header.php");
?>

    <div class="admin_create_post_post_form">
        <form action="functions.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="title" id="" placeholder="Enter title" class="admin_create_post_post_form_title" required>
            </div>
            <div>
                <textarea type="text" name="content" id="" placeholder="Enter content" class="admin_create_post_post_form_content" required></textarea> 
            </div>
            <div class="admin_create_post_post_form_image">
                <p>Add image :</p>
                <input type="file" name="image" id="" accept="image/*" class="admin_create_post_post_form_image_img" required>
            </div>
            <div>
                <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
            </div>

            <div class="admin_create_post_post_form_btn">
                <input type="submit" value="Submit" name="create" class="admin_create_post_post_form_btn_input">
            </div>
        </form>
    </div>

<?php
    include("templates/footer.php");
?>
