<?php

// @include 'config.php';

// session_start();

// if(isset($_POST['submit'])){

//    $name = mysqli_real_escape_string($conn, $_POST['name']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $password = md5($_POST['password']);

//    $select = " SELECT * FROM user WHERE email = '$email' && password = '$password' ";

//    $result = mysqli_query($conn, $select);

//    if(mysqli_num_rows($result) > 0){

//       $row = mysqli_fetch_array($result);

//       if($row['password'] == $password){

//          $_SESSION['name'] = $row['name'];
//          header('location: admin_page.php');
//    }
//    else{
//       $error[] = 'incorrect email or password!';
//    }

// };

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Bootstrap CDN link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
</head>
<body>
<ul>

<li><a  href="index.php"><span class="material-symbols-outlined"> Home </span><p style="display: flex; float:right;"> Home</p></a></li>
<li><a href="#about">About</a></li>
<li><a href="login_form.php" class="active">Login</a></li>
<li><a href="user_register_form.php" class="sign">Sign Up</a></li>

</ul>

<div class="form-container">

   <form action="user_login.php" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="user_register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>