<?php


require 'config.php'; // Include the database connection file

// Enable detailed error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_existing_user($username, $email, $conn ,$user_id) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?  OR user_id = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $username, $email,$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function is_valid_user_id($user_id) {
    return preg_match('/^U\d{3}$/', $user_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $errors = [];

    if (!is_valid_user_id($user_id)) {
        $errors[] = "User ID must be in the format 'U<BOOK_ID>' (e.g., U001).";
    }
    if (strlen($password) <= 8) {
        $errors[] = "Password must be more than 8 characters.";
    }

    if (!is_valid_email($email)) {
        $errors[] = "Invalid email format.";
    }

    if (is_existing_user($username, $email, $conn,$user_id)) {
        $errors[] = "Username or email already registered.";
    }

    if (empty($errors)) {
        $hashed_password = md5($password); // MD5 hashing of the password
        $stmt = $conn->prepare("INSERT INTO user (user_id, first_name, last_name, username, password, email) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssss", $user_id, $firstname, $lastname, $username, $hashed_password, $email);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Registration failed: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
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


<a href="user_register_form.php" class="button">Go Back</a>

</body>
</html>