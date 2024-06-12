<?php

require 'config.php';

// Initialize variables to store user input
$username = $password = '';
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email and password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if email is empty
    if (empty($username)) {
        $errors[] = "username is required.";
    }

    // Check if password is empty
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are no errors, proceed with login
    if (empty($errors)) {
        // Prepare SQL statement to fetch user data
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, verify password
            $user = $result->fetch_assoc();
            if (md5($password) === $user['password']) { // Verify password using MD5 hash
                // Password is correct, start session and redirect user
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                header("Location: admin_page.php"); // Redirect to dashboard or any other page
                exit();
            } else {
                // Incorrect password
                $errors[] = "Invalid email or password.";
            }
        } else {
            // User not found
            $errors[] = "user not found!.";
        }
    }
}


$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CDN link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        .myDiv {
  color: red;
  text-align: left;
  font-size: large;
}
        .button {
  background-color: #04AA6D; /* Green */
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
    
    <?php if (!empty($errors)): ?>
        <div class="myDiv">   <?php print_r($errors)?>  </div>
    <?php endif; ?>
    <br>
    <a href="login_form.php" class="button">Go Back</a>
    
</body>
</html>