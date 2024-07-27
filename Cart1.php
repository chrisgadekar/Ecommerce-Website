<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<?php



require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'Cart1.php'</script>";
          }
      }
  }
}


?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Produts</title>
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
<!------ cart items details ------->
<div class="small-container">

    <table>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
            <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>
    </table>

    <div class="total-price">

        <table>
            <tr>
                <td>PRICE DETAILS</td>
                <td></td>
            </tr>
        <tr>
            <td> 
                <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h4>Price ($count items)</h4>";
                            }else{
                                echo "<h4>Price (0 items)</h4>";
                            }
                        ?>
                        </td>
            <td><?php echo $total; ?></td>
        </tr>
        <tr>
            <td>Delivery Charges</td>
            <td><h5 class="text-success">FREE</h5></td>
        </tr>
        </table>
    </div>
    <div class="total-price">
 
     <table>
            <tr>
                 <td>Amount Payable</td>
                 <td><?php
                            echo $total;
                            ?>
                 </td>
            </tr>
        </table>
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

<!-------------js for price multiply----------->
<script>
    let quantity=document.querySelectorAll('.inp')
    let disp = document.querySelector('.disp')
    quantity.addEventListener('change',()=>{
        disp.textContent=disp.textContent*quantity.value
    })
</script>