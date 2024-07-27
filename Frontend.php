<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   
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
                    <h1>Give Your Life<br>A New Style!</h1>
                    <p>Success isn't always about greatness. It's about 
                    consistency. Consistent<br> hard work leads to success. Greatness 
                    will come.</p>
                    <a href="Product.php" class="btn">Explore Now &#8594;</a>
                </div>
                   <div class="col-2">
                      <img src="./upload/image1.png" width="100%">
                    </div>
                  
                </div>
            </div>
        </div>
   </div>

      <!-------------------Categories--------------->
      <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="./upload/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="./upload/category-2.jpg">
                </div>
                <div class="col-3">
                    <img src="./upload/category-3.jpg"> 
                </div>
            </div>
        </div>
       </div>
                   
   <!--------------------Featured Products------------->
   <div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <a href="Product.php">
            <div class="col-4">
                <img src="./upload/product-1.jpg" >
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>750.Rs</p>
            </a>
        </div>
        <a href="Product.php">
            <div class="col-4">
                <img src="./upload/product-2.jpg" >
                <h4>Black Shoes</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>950.Rs</p>
            </a>
            </div>
        
        <a href="Product.php">

            <div class="col-4">
                <img src="./upload/product-3.jpg" >
                <h4>Grey Track Pant</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>750.Rs</p>
            </a>
            </div>
        <a href="Product.php">
            <div class="col-4">
                <img src="./upload/product-4.jpg" >
                <h4>Blue Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>750.Rs</p>
            </a>
            </div>
    </div>
   </div>


        <!--------------------footer--------------------->

    <div class="footer">
            <div class="container">    
            <div class="row">
                <div class="footer-col-1">
                    <h3>Have a good time</h3>
                    <p>Enjoy your shopping experience</p>
                    <div class="app-logo">
                        <img src="./upload/app-store.png">
                        <img src="./upload/play-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                 <img src="./upload/logo-white.png">
                  <p>Our Purpose Is To Sustainably Make the pleasure and benefits of Products Accessible to the Many.</p>
                </div>
                <div class="footer-col-3">
                      <h3>Useful Links</h3>
                       <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Join Affiliate</li>

                        </ul>
                </div>
                <div class="footer-col-4">
                        <h3>Follow Us</h3>
                     <ul>
                          <li>Facebook</li>
                          <li>Instagram</li>
                          <li>Twitter</li>
                          <li>YouTube</li>
                     </ul>
                </div>
            </div>
      <hr>
        <p class="copyright">Copyright 2023</p>
        </div>
        </div>

        <!---------------js for toggle menu--------------------->

        <script>

            var MenuItems = document.getElementById("MenuItems"); 
            MenuItems.style.maxHeight = "0px";
            function menutoggle() {

                if (MenuItems.style.maxHeight == "0px") {

                    MenuItems.style.maxHeight = "200px";

                }
                else {

                    MenuItems.style.maxHeight = "0px";

                }
            }

        </script>

     