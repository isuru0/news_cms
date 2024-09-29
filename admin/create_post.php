<?php
    include("templates/header.php");
?>

    <div class="admin_create_post_post-form">
        <form action="functions.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="title" id="" placeholder="Enter title" required>
            </div>
            <div>
                <input type="text" name="content" id="" placeholder="Enter content" required>
            </div>
            <div>
                <input type="file" name="image" id="" accept="image/*" required>
            </div>
            <div>
                <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
            </div>

            <div>
                <input type="submit" value="submit" name="create">
            </div>
        </form>
    </div>

<?php
    include("templates/footer.php");
?>
