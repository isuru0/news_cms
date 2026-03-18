<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName="db_news_cms";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Something went wrong, database is not connected!");
}
?>