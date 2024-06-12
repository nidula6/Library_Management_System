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


<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="adminstyle.css">

<style>
</style>

</head>


<body style=" background-color:#eeeeee;">

    <!--header section-->
                 
    <div id="user" style="background-color:#434B82;align-items:center;">
        
        <span  style="font-size: 30px; text-transform: uppercase; margin-bottom: 10px; padding:10px; color:white  ;">  Welcome to the admin panel, <?php echo $_SESSION['username']." !"?></span>
        <button align-item="left" type="button" class="btn btn-danger" style="display:flex;float:right"><a href="logout.php" class="button" style="color: white;">Logout</a></button>
</div>

    <!-- Navigation menu -->
<div  class="header">
    <ul>
        <li><a href="#user">Users</a></li>
        <li><a href="#books" class="sign">Books</a></li>
        <li><a href="#catagory" class="sign">Book category</a></li>
    </ul>
</div>



<br>
<hr>

<h2 class="oswald-12" style="font-weight: bold;text-align:center">Users Section</h2>
<div  class="container">
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
                            <th>Password</th>
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
                                    <td class="arimo-1">
                                        <?php echo $row['user_id']; ?>
                                    </td>
                                    <td class="arimo-1">
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td class="arimo-1">
                                        <?php echo $row['first_name']; ?>
                                    </td>
                                    <td class="arimo-1">
                                        <?php echo $row['last_name']; ?>
                                    </td>
                                    <td class="arimo-1">
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td class="arimo-1">
                                        <?php echo $row['password']; ?>
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

        
        <hr>
       
        
           
        

   <div class="form-container">

<form action="process.php" method="post">
   <h3 class="oswald-12" style="font-weight: bold;">Update user details </h3>
   
   <input type="text" id="user_idold" name="user_idold"
                        placeholder="Enter User ID to edit user details. "  Required><br><br>
   
  
   <input type="text" id="user_idnew" name="user_idnew"
                        placeholder="Enter New User ID "  Required><br><br>
   
  
   <input type="email" id="email" name="email"
                                        placeholder="Enter the email" Required><br><br>
   
   <input type="text" id="firstname" name="firstname"
                                    placeholder="Enter the First Name" Required><br><br>
   
   
    <input type="text" id="lastname" name="lastname"
                                        placeholder="Enter the Last Name" Required><br><br>
   
   
   <input type="text" id="username" name="username"
                                        placeholder="Enter the username"  Required><br><br>
   
   
    <input type="password" id="password" name="password"
                                        placeholder="Enter the password">
                    
    <input type="submit" name="edit" value="Update details" class="form-btn">
                        
                     
</form>

</div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->

        <hr>
        <h2 class="oswald-12" style="font-weight: bold;text-align:center">Book Section</h2>
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

    <div id="books"class="container">
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

        <div class="form-container" style="float: left;">
        
        <form action="book_registration.php" method="POST">
            <h2   class="oswald-12" style="font-weight: bold;">Register a New Book</h2>
            <br>
           
                    <input type="text" class="form-control" id="book_id" name="book_id" placeholder="Enter Book ID (e.g., B001)" required>
        
                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name" required>
                
                    <select  id="book_category" name="book_category" required>
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
                
            
                    <input type="submit"  value="Register Book" class="form-btn">
            
                  
                
            
        </form>
    </div>


<div class="form-container" style="float:left">
    <form action="edit_book.php" method="POST">
        
            <h3 for="book_id" class="oswald-12" style="font-weight: bold;">Enter Book ID to edit Book details:</h3>
            
            <input type="text" id="book_idold" name="book_idold" placeholder="Enter Book ID" style="width: 300px;" required>
            

                <input type="text" id="book_idnew" name="book_idnew" placeholder="Enter New Book ID" style="width: 300px;" required>
            

        
                <input type="text"id="book_name" name="book_name" placeholder="Enter New Book Name" style="width: 300px;" required>
            

        
           
                <select id="category_id" name="category_id" style="width: 300px;" required>
                    <?php
                    require 'config.php';
                    $sql = "SELECT * FROM bookcategory";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_Name'] . "</option>";
                    }
                    ?>
                </select>

                <input type="submit" name="edit_book" value="Update Book Details" class="form-btn">
        
    </form>
</div>
<hr>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->
<h2 class="oswald-12" style="font-weight: bold;text-align:center">Book category Section</h2>

<div  class="container">
        <div style="margin-bottom:5em;">
            <table id="tbl" class="table table-hover dt-responsive" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Date Modified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'config.php';
                    $sql = "SELECT category_id,category_name,date_modified 
                            FROM bookcategory";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['category_id']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['date_modified']; ?></td>
                                <td>
                                    <a href="delete_category.php?delete=<?php echo $row['category_id'] ?>" class="btn btn-danger btn-xl" style="display: inline !important;">Delete</a>
                                    
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

<div id="catagory" class="form-container" style="float: left;">

<form action="book_category.php" method="POST">
            <h2   class="oswald-12" style="font-weight: bold;">Register a New Book Category</h2>
            <br>
           
                    <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Enter category_id (e.g., C001)" required>
        
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category Name" required>
                
                    
                
            
                    <input type="submit"  value="Register Book" class="form-btn">
            
                  
                
            
        </form>

</div>



<div class="form-container" style="float:left">
    <form action="update_book_C.php" method="POST">
        
            <h3 class="oswald-12" style="font-weight: bold;">Update Book Category details:</h3>
            <label for="category_id" style="color:red;font-style :italic">Select Category ID you want to change:</label>
            
                <input type="text"id="category_id" name="category_id" placeholder="Enter old Book category ID" style="width: 300px;" required>
            
                <input type="text"id="category_idnew" name="category_idnew" placeholder="Enter New Book category ID" style="width: 300px;" required>
            
                <input type="text"id="category_name" name="category_name" placeholder="Enter New Book category name" style="width: 300px;" required>
            

                <input type="submit" name="update_book_C" value="Update Book Category Details" class="form-btn">
        
    </form>
</div>

<script src="script.js"></script>
</body>
</html>
