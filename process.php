<?php
require_once('config.php');
session_start();

$update = false;
$user_id = 0;
$firstname = '';
$lastname = '';
$email = '';
$username = '';


// if (isset($_POST['save'])) {

//     print_r($_POST);

//     $user_id = $_POST['user_id'];
//     $firstname = $_POST['firstname'];
//     $email = $_POST['email'];
//     $lastname = $_POST['lastname'];
//     $username = $_POST['username'];

//     $sql = "INSERT INTO user (user_id, first_name, last_name, username,  email) VALUES ('$user_id', $firstname, '$emlastnameail','$username','$email')";

//     $conn->query($sql) or die($conn->error);
//     echo "Record has been saved!";
//     echo "Now you are in the process.php file $_POST[save]";

//     header("Location: admin_page.php");
// }

if (isset($_GET['delete'])) {

    $id = $_GET['delete']; //7

    $sql = "DELETE FROM user WHERE user_id = '$id'"; //7

    $conn->query($sql) or die($conn->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    echo "<h1>Now you are in the process.php file /$_GET[delete]/<-deleted</h1>";

    header("Location: admin_page.php");
}

 
// if (isset($_POST['edit'])) {

//     $user_id = $_POST['user_id'];
//     $email = $_POST['email'];
//    $firstname = $_POST['firstname'];
   
//    $lastname = $_POST['lastname'];
//    $username = $_POST['username'];

//     $sql = "UPDATE user SET email='$email', first_name='$firstname' , last_name='$lastname' , username='$username' WHERE user_id = '$user_id'";
    
//     $conn->query($sql) or die($conn->error);

 
//     $_SESSION['message'] = "Record has been Updated!";
//     $_SESSION['msg_type'] = "warning";
//     header("Location: admin_page.php");
// }
if (isset($_POST['edit'])) {
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];

    // Check if the user ID already exists in the user table
    $check_sql = "SELECT COUNT(*) as count FROM user WHERE user_id = '$user_id'";
    $check_result = $conn->query($check_sql);
    $check_row = $check_result->fetch_assoc();

    if ($check_row['count'] > 0) {
        // If the user ID exists, update the user data
        $update_sql = "UPDATE user SET email='$email', first_name='$firstname', last_name='$lastname', username='$username' WHERE user_id = '$user_id'";
        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['message'] = "Record has been Updated!";
            $_SESSION['msg_type'] = "warning";
        } else {
            $_SESSION['message'] = "Error updating record: " . $conn->error;
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "User ID does not exist!";
        $_SESSION['msg_type'] = "danger";
    }

    // Redirect back to admin_page.php
    header("Location: admin_page.php");
    exit();
}

?>