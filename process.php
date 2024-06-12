<?php
require_once('config.php');
session_start();

$update = false;
$user_id = 0;
$firstname = '';
$lastname = '';
$email = '';
$username = '';




if (isset($_GET['delete'])) {

    $id = $_GET['delete']; //7

    $sql = "DELETE FROM user WHERE user_id = '$id'"; //7

    $conn->query($sql) or die($conn->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    echo "<h1>Now you are in the process.php file /$_GET[delete]/<-deleted</h1>";

    header("Location: admin_page.php");
}

 

if (isset($_POST['edit'])) {
    $user_idold = $_POST['user_idold'];
    $user_idnew = $_POST['user_idnew'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];



if (preg_match("/^U\d{3}$/", $user_idnew)) {
   
    $hashed_password = md5($password);
    $update_stmt = $conn->prepare("UPDATE user SET user_id = ?, email =? ,first_name = ? ,last_name = ?,username = ?,password = ? WHERE user_id = ?");
    $update_stmt->bind_param("sssssss", $user_idnew, $email, $firstname,$lastname,$username ,$hashed_password,$user_idold);
    
 
    if ($update_stmt->execute()) {
        $_SESSION['message'] = "User  details have been updated!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error updating user details: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }
} else {
    $_SESSION['message'] = "User ID must be in the format 'C<Category_ID>' (e.g., U001).";
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