<?php

require_once('config.php');
session_start();

if (isset($_POST['edit_book'])) {
    $book_idold = $_POST['book_idold'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];
    $book_idnew = $_POST['book_idnew'];

if (preg_match("/^B\d{3}$/", $book_idnew)) {
   
    $update_stmt = $conn->prepare("UPDATE book SET book_id = ?, book_name =? ,category_id = ? WHERE book_id = ?");
    $update_stmt->bind_param("ssss", $book_idnew, $book_name, $category_id,$book_idold);
    
   
    if ($update_stmt->execute()) {
        $_SESSION['message'] = "Book  details have been updated!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error updating book details: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }
} else {
    $_SESSION['message'] = "Book ID must be in the format 'C<Category_ID>' (e.g., B001).";
    $_SESSION['msg_type'] = "danger";
}

header("Location: admin_page.php");
exit();
}

$_SESSION['message'] = "Invalid request!";
$_SESSION['msg_type'] = "danger";
header("Location: admin_page.php");
exit();
?>