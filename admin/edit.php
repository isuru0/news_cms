<?php
    include("templates/header.php");
?>

<?php 
    $id = $_GET['id'];
    if($id) {
        include("../connect.php");
        $sqlEdit = "SELECT *  FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sqlEdit);
    }else {
        echo "No Post Found";
    }
?>

    <div class="post-form">
            <form action="functions.php" method="post" enctype="multipart/form-data">
                <?php
                    while($data = mysqli_fetch_array($result)) {
                ?>

                <div>
                    <input type="text" name="title" id="" placeholder="Enter title: " value="<?php echo $data['title']; ?>" >
                </div>
                <div>
                    <input type="text" name="content" id="" placeholder="Enter content: " value="<?php echo $data['content']; ?>">
                </div>
                <div>
                    <img src="<?php echo $data["image_path"]; ?>" style="width:100px" >
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
                    }
                ?>
            </form>
    </div>

<?php
    include("templates/footer.php");
?>