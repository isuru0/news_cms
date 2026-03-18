<?php
$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

if($id > 0) {
    include("../../connect.php");
    $sqlDelete = "DELETE FROM posts WHERE id = $id";
    if(mysqli_query($conn, $sqlDelete)) {
        header("Location: ../index.php", true, 302);
        exit;
    }

    die("Something went wrong. Data is not deleted!");
}

echo "Post Not Found";
?>