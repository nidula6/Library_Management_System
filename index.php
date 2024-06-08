<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <style>

        /* Basic styling for the body */
        html,body {
            font-family: Arial, sans-serif;
            height:100%;
            margin:0;
        }
        /* Styling for the navigation menu */ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   border: 1px solid #e7e7e7;
   background-color: white;
   display: flex;
   justify-content: center;
 }
 
 li {
   margin-left: 10px; 
 }
 
 li a {
   display: block;
   color: #666;
   text-align: center;
   padding: 14px 16px;
   text-decoration: none;
 }
 
 li a:hover:not(.active) {
   background-color: #9ca4ff;
   color: white;
 }
 
 li a.active {
   color: white;
   background-color: #9ca4ff;
 }
 
 li a.sign {
   display: flex;
   align-items: center; 
 }
 
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
 
        .hero {
            background: url('libpic.png');
            background-size: cover;
            color: black;
            padding: 100px 0;
            text-align: center;
            height: 100%;
        }
        .hero h1 {
            font-size: 4em;
            color: #9ca4ff;
            background-color: white;
        }
        .hero p {
            font-size: 1.5em;
        }
        .hero .btn {
            margin-top: 20px;
            
        }
        /* Features section styling */
        
     
    </style>
</head>
<body>
    <!-- Navigation menu -->
    <ul>
        <li><a class="active" href="#home"><span class="material-symbols-outlined">home</span> <p style="display: inline; float:right; margin-left: 5px;">Home</p></a></li>
        <li><a href="about.php" class="sign">About</a></li>
        <li><a href="login_form.php" class="sign">Login</a></li>
        <li><a href="user_register_form.php" class="sign">Sign Up</a></li>
    </ul>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to the Library Management System</h1>
        <a href="user_register_form.php" class="btn btn-primary btn-lg">Get Started</a>
    </div>

    <!-- Features Section -->
    <div class="container features">
        <div class="row">
            <div class="col-md-4 feature-item">
                <span class="material-symbols-outlined" style="font-size: 48px;">speed</span>
                <h3>Fast Performance</h3>
                <p>Experience blazing fast speeds with our services.</p>
            </div>
            <div class="col-md-4 feature-item">
                <span class="material-symbols-outlined" style="font-size: 48px;">security</span>
                <h3>Secure</h3>
                <p>Top-notch security to keep your data safe and secure.</p>
            </div>
            <div class="col-md-4 feature-item">
                <span class="material-symbols-outlined" style="font-size: 48px;">support</span>
                <h3>24/7 Support</h3>
                <p>Our team is here to help you around the clock.</p>
            </div>
        </div>
    </div>


   
 
</body>
</html>