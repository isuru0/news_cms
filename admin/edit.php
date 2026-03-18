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

    <div class="post-form">
            <form action="functions.php" method="post" enctype="multipart/form-data">
                <?php
                    if($data) {
                ?>

                <div>
                    <input type="text" name="title" id="" placeholder="Enter title: " value="<?php echo $data['title']; ?>" >
                </div>
                <div>
                    <input type="text" name="content" id="" placeholder="Enter content: " value="<?php echo $data['content']; ?>">
                </div>
                <div>
                    <img src="<?php echo $adminImagePath; ?>" style="width:100px" >
                    <input type="file" name="image" id="" accept="image/*">
                </div>
                <div>
                    <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
                </div>

                <div>
                    <input type="submit" value="Submit" name="update">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>

                <?php
                    } else {
                        echo "No Post Found";
                    }
                ?>
            </form>
    </div>

<?php
    include("templates/footer.php");
?>