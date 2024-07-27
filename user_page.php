<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redstore</title>
        <link rel="stylesheet" href="style.css">
        <link href="http://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <script src="https://kit.fontawesome.com/6b1fe56c89.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="Frontend.php">
                        <img src="./upload/logo.png" width="125px">
                    </a>
                </div>
                <nav>
                    <ul id="MenuItems">
                    <li><a href="Frontend.php">Home</a></li>
                        <li><a href="Product.php">Product</a></li>
                        <li><a href="./recommendation.php">Recommendations</a></li>
                        <li><a href="./login_form.php">Login</a></li>
                        <li><a href="./register_form.php">Register</a></li>
                        <li><a href="./user_page.php">Welcome <span><?php 
                        if(isset($_SESSION['user_name'])){
                            echo $_SESSION['user_name']; 
                        }else{
                            
                            echo "user";
                        }
                        
                       ?></span></a></li>
                    </ul>
                </nav>
                <a href="Cart1.php">
                    <img src="./upload/cart.png" width="30px" height="30px">
                </a>
                <img src="./upload/menu.png" class="menu-icon" onclick="menutoggle()">
           </div>
        </div>
        <div class="account-page">
            <div class="container">
              <div class="row">
                <div class="col-2">
                <h3>Hi, <span>User</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>This is an user page</p>
      <a href="./login_form.php" class="btn">login</a>
      <a href="./register_form.php" class="btn">register</a>
      <a href="./logout.php" class="btn">logout</a>
                </div>
                   <div class="col-2">
                      <img src="./upload/image1.png" width="100%">
                    </div>
                  
                </div>
            </div>
        </div>
   </div>