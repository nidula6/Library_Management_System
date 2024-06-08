<?php

require_once('config.php');
session_start();

if (isset($_POST['edit_book'])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];

    // Check if the book ID already exists in the book table
    $check_sql = "SELECT COUNT(*) as count FROM book WHERE book_id = '$book_id'";
    $check_result = $conn->query($check_sql);
    $check_row = $check_result->fetch_assoc();

    if ($check_row['count'] > 0) {
        // If the book ID exists, update the book data
        $update_sql = "UPDATE book SET book_name='$book_name', category_id='$category_id' WHERE book_id='$book_id'";
        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['message'] = "Book details have been updated!";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating book details: " . $conn->error;
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "Book ID does not exist!";
        $_SESSION['msg_type'] = "danger";
    }

    // Redirect back to admin_page.php
    header("Location: admin_page.php");
    exit();
}

?>