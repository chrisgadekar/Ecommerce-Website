<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<?php
@include 'config.php';


require_once ('php/CreateDb.php');
require_once ('./php/component.php');

$productName='';
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
              <form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
</form>
              </div>
              <div class="row">     
               <?php
$con = mysqli_connect("localhost", "root","","productdb");               
            if (isset($_POST["submit"])) {
	        $str = $_POST["search"];        
                $sql = "Select * from producttb where Category in (select Category from producttb where product_name='$str')";
                $queryfire = mysqli_query($con,$sql);
                $num=mysqli_num_rows($queryfire);
                while( $res=mysqli_fetch_array($queryfire)){
                    component($res['product_name'], $res['product_price'], $res['product_image'], $res['id'],!isset($_SESSION['user_name']));
                    ?>
                    <br>
                    <?php
                }
            }
                ?> 
                </div>
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
