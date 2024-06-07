<?php

@include 'config.php';
session_start();

if(!isset($_SESSION['username'])){
   header('location: user_login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>admin page</title>

   
   <!-- Bootstrap CDN link  -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

        
</head>
<body>


<h3>Welcome, <?php echo $_SESSION['username'] ?></h3>
<button type="button" class="btn btn-danger"><a href="logout.php" class="button" style="color: white;">Logout</a></button>




<div class="container">
        <?php
        if (isset($_SESSION['message'])): ?>

            <div style="display:flex; top:30px;" class="alert alert-<?= $_SESSION['msg_type'] ?> fade show" role="alert">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['msg_type']);

                ?>


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="container">

            <div style="margin-bottom:5em;">

                <table id="tbl" class="table table-hover dt-responsive" style=" width: 100%;">
                    <thead class="thead-dark">

                        <tr>
                            <th>user_id</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            
                            while ($row = $result->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $row['user_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['first_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['last_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['username']; ?>
                                    </td>
                                    
                                    <td>
                                        

                                        <a href="process.php?delete=<?php echo $row['user_id'] ?>" class="btn btn-danger btn-xl"
                                            style="display: inline !important;">Delete</a>
                                    </td>
                                </tr>
                            </tbody>

                            <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>


                </table>


            </div>

        <br>
        <hr>
        <br>
        
            <!--update and add -->
            <div>
                <div>


                    <?php
                    if ('$update' == true):
                        ?>
                        <h4>Edit user</h4>

                    <?php else: ?>
                        <h4>Add user</h4>

                    <?php endif; ?>

                </div>
                <div>
                    <div class="container" style="margin-top: 40px;">
                        <form action="process.php" method="POST">
                            


                                <div class="form-group row">
                                    <label for="text" class="col-sm-2 col-form-label" style="color: #e67067;"> Enter User ID to edit user details.</label>
                                 <div class="col-sm-10">

                                    <input type="text" class="form-control" id="user_id" name="user_id"
                                    placeholder="Enter user ID " style="width: 300px;" Required>

                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">email</label>
                                <div class="col-sm-10">

                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter the email" style="width: 300px;"Required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-sm-2 col-form-label">Fisrt Name</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        placeholder="Enter the First Name" style="width: 300px;"
                                         Required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        placeholder="Enter the Last Name" style="width: 300px;"
                                        Required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">username</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Enter the username" style="width: 300px;"
                                         Required>
                                </div>
                            </div>

                            


                    </div>
                    <div>
                        
                    <a href="admin_page.php"><button
                    class="btn btn-success" type="submit" name="edit">Edit</button></a>
                        
                            

                        

                    </div>

                    </form>

                </div>

            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="container">
        <h2>Register a New Book</h2>
        <form action="book_registration.php" method="POST">
            <div class="form-group row">
                <label for="book_id" class="col-sm-2 col-form-label">Book ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_id" name="book_id" placeholder="Enter Book ID (e.g., B001)" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="book_name" class="col-sm-2 col-form-label">Book Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="book_category" class="col-sm-2 col-form-label">Book Category</label>
                <div class="col-sm-10">
                    <select class="form-control" id="book_category" name="book_category" required>
                    <?php
                        // Fetch categories from the database
                        require 'config.php';
                        $sql = "SELECT category_id, category_Name FROM bookcategory";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["category_id"] . '">' . $row["category_Name"] . '</option>';
                            }
                        }

                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Register Book</button>
                </div>
            </div>
        </form>
    </div>


    

    <div class="container">
    <?php if (isset($_SESSION['message'])): ?>
        <div style="display:flex; top:30px;" class="alert alert-<?= $_SESSION['msg_type'] ?> fade show" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['msg_type']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="container">
        <div style="margin-bottom:5em;">
            <table id="tbl" class="table table-hover dt-responsive" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Book Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'config.php';
                    $sql = "SELECT book.book_id, book.book_name, bookcategory.category_Name 
                            FROM book 
                            JOIN bookcategory ON book.category_id = bookcategory.category_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['category_Name']; ?></td>
                                <td>
                                    <a href="book_registration.php?delete=<?php echo $row['book_id'] ?>" class="btn btn-danger btn-xl" style="display: inline !important;">Delete</a>
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No results found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="container" style="margin-top: 40px;">
    <form action="book_registration.php" method="POST">
        <div class="form-group row">
            <label for="book_id" class="col-sm-2 col-form-label" style="color: #e67067;">Enter Book ID to edit Book details:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="book_id" name="book_id" placeholder="Enter Book ID" style="width: 300px;" required>
            </div>
        </div>

        

        <div class="form-group row">
            <label for="book_name" class="col-sm-2 col-form-label">Book Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name" style="width: 300px;" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label">Book Category</label>
            <div class="col-sm-10">
                <select class="form-control" id="category_id" name="category_id" style="width: 300px;" required>
                    <?php
                    require 'config.php';
                    $sql = "SELECT * FROM bookcategory";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_Name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button class="btn btn-success" type="submit" name="edit_book">Update Book Details</button>
            </div>
        </div>
    </form>
</div>







</body>
</html>