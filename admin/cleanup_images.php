<?php

function cleanup_unused_images() {
    // Database connection
    include("../connect.php");

    // Directory where images are stored
    $folderPath = "post_images_upload/";

    // Get list of images from the folder
    $folderImages = array_diff(scandir($folderPath), array('.', '..')); // Scans the folder and removes '.' and '..'

    // Get list of images from the database
    $sql = "SELECT image_path FROM posts";
    $result = mysqli_query($conn, $sql);

    $databaseImages = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract the image filename from the database path
        $databaseImages[] = basename($row['image_path']);
    }

    // Find images that are in the folder but not in the database
    $imagesToDelete = array_diff($folderImages, $databaseImages);

    // Loop through the images to delete them
    foreach ($imagesToDelete as $image) {
        $imagePath = $folderPath . $image;
        if (is_file($imagePath)) {
            if (unlink($imagePath)) {
                echo "Deleted image: $imagePath<br>";
            } else {
                echo "Error deleting image: $imagePath<br>";
            }
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<?php
cleanup_unused_images();
?>