<?php
    include("templates/header.php");
?>

<?php 
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    if($id > 0) {
        include("../connect.php");
        $sqlEdit = "SELECT *  FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sqlEdit);
        $data = mysqli_fetch_assoc($result);
        if ($data) {
            $adminImagePath = ltrim($data["image_path"], "/");
            if (strpos($adminImagePath, "admin/") === 0) {
                $adminImagePath = substr($adminImagePath, 6);
            }
        }
    }else {
        $data = null;
    }
?>

    <div class="post-form admin_edit_post_form_wrap">
            <form action="functions.php" method="post" enctype="multipart/form-data" class="admin_edit_post_form">
                <?php
                    if($data) {
                ?>

                <h2 class="admin_edit_post_heading">Edit Post</h2>

                <div class="admin_edit_post_field">
                    <label class="admin_edit_post_label" for="edit_title">Title</label>
                    <input type="text" name="title" id="edit_title" placeholder="Enter title" value="<?php echo htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?>" class="admin_edit_post_input" required>
                </div>

                <div class="admin_edit_post_field">
                    <label class="admin_edit_post_label" for="edit_content">Content</label>
                    <textarea name="content" id="edit_content" placeholder="Enter content" class="admin_edit_post_textarea" required><?php echo htmlspecialchars($data['content'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="admin_edit_post_field">
                    <p class="admin_edit_post_label">Current Image</p>
                    <div class="admin_edit_post_image_row">
                        <img src="<?php echo htmlspecialchars($adminImagePath, ENT_QUOTES, 'UTF-8'); ?>" class="admin_edit_post_image_preview" alt="Current post image">
                        <div class="admin_edit_post_file_wrap">
                            <label class="admin_edit_post_file_label" for="edit_image">Replace Image (optional)</label>
                            <input type="file" name="image" id="edit_image" accept="image/*" class="admin_edit_post_file_input">
                        </div>
                    </div>
                </div>

                <div>
                    <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
                </div>

                <div class="admin_edit_post_actions">
                    <a href="index.php" class="admin_edit_post_cancel">Cancel</a>
                    <input type="submit" value="Update Post" name="update" class="admin_edit_post_submit">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>

                <?php
                    } else {
                        echo '<p class="admin_edit_post_empty">No Post Found</p>';
                    }
                ?>
            </form>
    </div>

<?php
    include("templates/footer.php");
?>