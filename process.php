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

//     }
// }

if (isset($_POST['edit'])) {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $user_id = $_POST['user_id'];


    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User ID exists
        // Here you can write code to update the user details or whatever you want to do.
        $sql = "UPDATE user SET email='$email', first_name='$firstname' , last_name='$lastname' , username='$username' WHERE user_id = '$user_id'";
    
    $conn->query($sql) or die($conn->error);

 
    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("Location: admin_page.php");
        
    } else {
        // User ID does not exist
        echo "User ID does not exist.";
    }

    


    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CDN link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        .button {
  background-color: #9ca4ff; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    </style>
</head>
<body>
<br>


<a href="admin_page.php" class="button">Go Back</a>

</body>
</html>