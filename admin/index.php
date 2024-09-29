<?php
    include("templates/header.php");
?>

<div class="posts-list">
    <table>
        <thead>
            <tr>
                <th style="width: 20%;">Publication Date</th>
                <th style="width: 35%;">Title</th>
                <th style="width: 20%;">Image</th>
                <th style="width: 25%;">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('../connect.php');
                $sqlSelect = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td class="table-data-date"><?php echo $data["date"]?></td>
                <td class="table-data-text"><?php echo $data["title"]?></td>
                <td class="table-data-image"><img src="<?php echo $data["image_path"]; ?>" style="width:100px" ></td>
                <td class="table-data-button">
                    <p class="table-data-btn-view"><a href="view.php?id=<?php echo $data["id"]?>">View</a></p>
                    <p class="table-data-btn-edit"><a href="edit.php?id=<?php echo $data["id"]?>">Edit</a></p>
                    <p class="table-data-btn-delete"><a href="control/delete.php?id=<?php echo $data["id"]?>">Delete</a></p>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>


<?php
    include("templates/footer.php");
?>