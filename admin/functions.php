<!-- INSERT DATA -->
<?php
if(isset($_POST["create"])) {

    include("../connect.php");

    //GET USER INPUTS
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    //GET & HANDLE THE IMAGE
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        //DEFINE THE UPLOAD DIRECTORY
        $upload_directory = "post_images_upload/";
        $target_file = $upload_directory . basename($image_name);

        if (move_uploaded_file($image_tmp, $target_file)) {

            //INSERT THE DATA INTO THE DATABASE
            $sqlInsert = "INSERT INTO posts (date, title, content, image_path) VALUES ('$date', '$title', '$content', '$target_file')";
            if (mysqli_query($conn, $sqlInsert)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!-- UPDATE DATA -->
<?php
if (isset($_POST["update"])) {
    include("../connect.php");

    //GET DATA
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    //GET & HANDLE THE IMAGE
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        //DEFINE THE UPLOAD DIRECTORY
        $upload_directory = "post_images_upload/";
        $target_file = $upload_directory . basename($image_name);

        if (move_uploaded_file($image_tmp, $target_file)) {

            //UPDATE THE DATA INTO THE DATABASE
            $sqlUpdate = "UPDATE posts SET date = '$date', title = '$title', content = '$content', image_path = '$target_file' WHERE id = $id";
            if (mysqli_query($conn, $sqlUpdate)) {
                echo "Data updated successfully!";

                // Call the cleanup function to remove unused images
                include("cleanup_images.php");
                cleanup_unused_images();
                
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }
        }
    } else {
        //UPDATE THE DATA INTO THE DATABASE
        $sqlUpdate = "UPDATE posts SET date = '$date', title = '$title', content = '$content' WHERE id = $id";
        if (mysqli_query($conn, $sqlUpdate)) {
            echo "Data updated successfully!";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }


}
?>