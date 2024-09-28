<?php
    include("../templates/header.php");
?>

<div class="post">
    <?php
        $id = $_GET['id'];
        if (isset($_GET["id"])) {
            include("../../connect.php");

            $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
            $result = mysqli_query($conn, $sqlSelectPost);
            while ($data = mysqli_fetch_array($result)) {
    ?>
                <h1><?php echo $data['title']; ?></h1>
                <img src="../<?php echo $data["image_path"]; ?>" style="width:100px" >
                <p><?php echo $data['date']; ?></p>
                <p><?php echo $data['content']; ?></p>

    <?php
            
            }
        }else {
            echo "No Post Found";
        }
    ?>

    <?php
        include('../../connect.php');
        $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sqlSelectPost);
        while ($data = mysqli_fetch_array($result)) {
    ?>
        <div class="control">
            <a href="../edit.php?id=<?php echo $data["id"]?>">Edit</a>
            <a href="delete.php?id=<?php echo $data["id"]?>">Delete</a>
        </div>

    <?php
        }
    ?>

</div>


<?php
    include("../templates/footer.php");
?>