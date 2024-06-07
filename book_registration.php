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

$conn->close();
?>
