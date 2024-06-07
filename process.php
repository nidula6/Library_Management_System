<?php
require_once('config.php');
session_start();

$update = false;
$user_id = 0;
$firstname = '';
$lastname = '';
$email = '';
$username = '';


if (isset($_POST['save'])) {

    print_r($_POST);

    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];

    $sql = "INSERT INTO user (user_id, first_name, last_name, username,  email) VALUES ('$user_id', $firstname, '$emlastnameail','$username','$email')";

    $conn->query($sql) or die($conn->error);
    echo "Record has been saved!";
    echo "Now you are in the process.php file $_POST[save]";

    header("Location: admin_page.php");
}

if (isset($_GET['delete'])) {

    $id = $_GET['delete']; //7

    $sql = "DELETE FROM user WHERE user_id = '$id'"; //7

    $conn->query($sql) or die($conn->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    echo "<h1>Now you are in the process.php file /$_GET[delete]/<-deleted</h1>";

    header("Location: admin_page.php");
}

// if (isset($_GET['edit'])) {
//     $user_id = $_GET['edit'];
//     $update = true;

//     // if session error occurs, use ==>  $_SESSION['error_up'] ="";

//     $result = $conn->query("SELECT * FROM user WHERE user_id = '$user_id'") or die($mysqli->error);
//     if (count(array($result)) == 1) {
//         $row = $result->fetch_array() or die($conn->error);
        
//          $firstname = $row['firstname'];
//          $email = $row['email'];
//          $lastname = $row['lastname'];
//          $username = $row['username'];

    }
}

if (isset($_POST['update'])) {
    
    $email = $_POST['email'];
   $firstname = $_POST['firstname'];
   
   $lastname = $_POST['lastname'];
   $username = $_POST['username'];

    $sql = "UPDATE user SET email='$email', first_name='$firstname' , last_name='$lastname' , username='$username' WHERE user_id = '$user_id'";
    
    $conn->query($sql) or die($conn->error);

 
    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("Location: admin_page.php");
}

?>