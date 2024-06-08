<?php

require_once('config.php');
session_start();

if (isset($_POST['edit_book'])) {
    $book_idold = $_POST['book_idold'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];
    $book_idnew = $_POST['book_idnew'];

//     // Check if the book ID already exists in the book table
//     $check_sql = "SELECT COUNT(*) as count FROM book WHERE book_id = '$book_id'";
//     $check_result = $conn->query($check_sql);
//     $check_row = $check_result->fetch_assoc();

//     if ($check_row['count'] > 0) {
//         // If the book ID exists, update the book data
//         $update_sql = "UPDATE book SET book_name='$book_name', category_id='$category_id' WHERE book_id='$book_id'";
//         if ($conn->query($update_sql) === TRUE) {
//             $_SESSION['message'] = "Book details have been updated!";
//             $_SESSION['msg_type'] = "success";
//         } else {
//             $_SESSION['message'] = "Error updating book details: " . $conn->error;
//             $_SESSION['msg_type'] = "danger";
//         }
//     } else {
//         $_SESSION['message'] = "Book ID does not exist!";
//         $_SESSION['msg_type'] = "danger";
//     }

//     // Redirect back to admin_page.php
//     header("Location: admin_page.php");
//     exit();
// }
if (preg_match("/^B\d{3}$/", $book_idnew)) {
    // Prepare and bind the update statement
    $update_stmt = $conn->prepare("UPDATE book SET book_id = ?, book_name =? ,category_id = ? WHERE book_id = ?");
    $update_stmt->bind_param("ssss", $book_idnew, $book_name, $category_id,$book_idold);
    
    // Execute the update statement
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

// Redirect back to admin_page.php
header("Location: admin_page.php");
exit();
}

// If the update_book_C parameter is not set or if the category ID format is invalid, redirect back to admin_page.php
$_SESSION['message'] = "Invalid request!";
$_SESSION['msg_type'] = "danger";
header("Location: admin_page.php");
exit();
?>