<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];
    $date_modified = date('Y-m-d H:i:s');
    

    if (preg_match("/^C\d{3}$/", $category_id)){

    $sql = "INSERT INTO bookcategory (category_id, category_Name, date_modified) VALUES ('$category_id','$category_name','$date_modified')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Book Category Registered Succesfully!";
            $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error Registering Category: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }

    
}
else {
    $_SESSION['message'] = "Book category ID must be in the format 'C<Category_ID>' (e.g., C001). " . $conn->error;
        $_SESSION['msg_type'] = "danger";
}
$conn->close();
header("Location: admin_page.php");
        exit();
}


?>