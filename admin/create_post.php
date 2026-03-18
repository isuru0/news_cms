<?php
    include("templates/header.php");
?>

    <div class="admin_create_post_form_wrap admin_edit_post_form_wrap">
        <form action="functions.php" method="post" enctype="multipart/form-data" class="admin_create_post_form admin_edit_post_form">
            <h2 class="admin_edit_post_heading">Add New Post</h2>

            <div class="admin_edit_post_field">
                <label class="admin_edit_post_label" for="create_title">Title</label>
                <input type="text" name="title" id="create_title" placeholder="Enter title" class="admin_edit_post_input" required>
            </div>

            <div class="admin_edit_post_field">
                <label class="admin_edit_post_label" for="create_content">Content</label>
                <textarea name="content" id="create_content" placeholder="Enter content" class="admin_edit_post_textarea" required></textarea>
            </div>

            <div class="admin_edit_post_field">
                <label class="admin_edit_post_file_label" for="create_image">Add Image</label>
                <input type="file" name="image" id="create_image" accept="image/*" class="admin_edit_post_file_input" required>
            </div>

            <div>
                <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
            </div>

            <div class="admin_edit_post_actions">
                <a href="index.php" class="admin_edit_post_cancel">Cancel</a>
                <input type="submit" value="Create Post" name="create" class="admin_edit_post_submit">
            </div>
        </form>
    </div>

<?php
    include("templates/footer.php");
?>
