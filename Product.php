
<?php
@include 'config.php';
session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'Product.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>



<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Products</title>
            <link rel="stylesheet" href="style.css">
            <link href="http://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
            <script src="https://kit.fontawesome.com/6b1fe56c89.js" crossorigin="anonymous"></script>
            
        </head>
        <body>
            
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
                         <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="Cart1.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                    <i class="fa fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-dark\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-dark\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

                    <img src="./upload/menu.png" class="menu-icon" onclick="menutoggle()">
               </div>
            </div>
<!--------------------featured products--------------------------->
<div class="small-container">
    <div class="row row-2">
        <h2>All Products</h2>
        <Select>
            <option>Default Sorting</option>
            <option>Sort by price</option>
            <option>Sort by popularity</option>
            <option>Sort by rating</option>
            <option>Sort by most sold</option>
        </Select>
    </div>
    <div class="row">
        <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'],!isset($_SESSION['user_name']));
                }
            ?>
        </div>
</div>
<div class="page-btn">
    <span>1</span>
    <span>2</span>
    <span>3</span>
    <span>4</span>
    <span>&#8594;</span>
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

 <!----------------js for sorting----------->