<?php
include 'config.php';
session_start();

if (isset($_GET['delete'])) {

    $id = $_GET['delete']; //7

    $sql = "DELETE FROM bookcategory WHERE category_id = '$id'"; //7

    $conn->query($sql) or die($conn->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    echo "<h1>Now you are in the delete_cetegory.php file /$_GET[delete]/<-deleted</h1>";

    header("Location: admin_page.php");
}
