<?php

require_once('config.php');
session_start();

if (isset($_POST['update_book_C'])) {
    $category_id = $_POST['category_id'];
    $category_idnew = $_POST['category_idnew'];
    $category_name = $_POST['category_name'];
    $date_modified = date('Y-m-d H:i:s');
    
    // Check if the new category ID matches the required format
    if (preg_match("/^C\d{3}$/", $category_idnew)) {
        // Prepare and bind the update statement
        $update_stmt = $conn->prepare("UPDATE bookcategory SET category_id = ?, category_Name = ? WHERE category_id = ?");
        $update_stmt->bind_param("sss", $category_idnew, $category_name, $category_id);
        
        // Execute the update statement
        if ($update_stmt->execute()) {
            $_SESSION['message'] = "Book Category details have been updated!";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Error updating book category details: " . $conn->error;
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "Book category ID must be in the format 'C<Category_ID>' (e.g., C001).";
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
