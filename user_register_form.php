



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>register form</title>

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
      <li><a href="about.php">About</a></li>
      <li><a href="login_form.php">Login</a></li>
      <li><a href="user_register_form.php" class="active">Sign Up</a></li>

   </ul>


   <div class="form-container">

      <form action="user_register.php" method="post">
         <h3>register now</h3>
         
         
         <input type="text" id="user_id" name="user_id" placeholder="Enter your user ID" required><br><br>
         
         
         <input type="text" id="firstname" name="firstname" placeholder="Enter your First Name" required><br><br>
         
         
         <input type="text" id="lastname" name="lastname" placeholder="Enter your Last Name" required><br><br>
         
         
         <input type="text" id="username" name="username" placeholder="Enter your User Name" required><br><br>
         
         
         <input type="password" id="password" name="password" placeholder="Enter your Password" required><br><br>
         
         
         <input type="email" id="email" name="email" placeholder="Enter your Email" required><br><br>
         
         
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>already have an account? <a href="login_form.php">login now</a></p>
      </form>

   </div>

   </body>

   </html>

