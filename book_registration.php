<?php

require_once('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $book_category = $_POST['book_category'];

    // Validate Book ID using regular expression
    if (preg_match("/^B\d{3}$/", $book_id)) {
        // Insert book details into the database
        $sql = "INSERT INTO book (book_id, book_name, category_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $book_id, $book_name, $book_category);
        if ($stmt->execute()) {
            echo "Book registered successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Invalid Book ID format. The Book ID should be in the 'B<BOOK_ID>' format (e.g., B001).";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM book WHERE book_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error deleting record: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }

    $conn->close();
    header("Location: admin_page.php");
    exit();
}


if (isset($_POST['edit_book'])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];


    $sql = "UPDATE book SET book_id='$book_id' , book_name='$book_name', category_id='$category_id' WHERE book_id='$book_id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Book details have been updated!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error updating book details: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }

    $conn->close();
    header("Location: admin_page.php");
    exit();
}

$conn->close();


?>
