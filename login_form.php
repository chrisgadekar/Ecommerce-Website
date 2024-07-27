<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:frontend.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Account Page</title>
            <link rel="stylesheet" href="style.css">
            <link href="http://fonts.googleapis.com/css2?family=Poppins:wght@300;400; 500;600;700&display=swap" rel="stylesheet">
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
            <!-----------------ACCOUNT COLUMN-->
            <div class="account-page">
                <div class="container">
                  <div class="row">
                       <div class="col-2">
                        <img src="./upload/image1.png" width="100%">
                       </div>
                       <div class="col-2">
                         <div class="form-container">
                           <div class="form-btn"> 
                               <span onclick="login()">Login</span> 
                            </div>
                        
                        <form action="" method="post">
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="./register_form.php">register now</a></p>
   </form>

                        
                        </div>
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
   <!--------------------js for toggle Form----------------------------->

   <script>

    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register() {

        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";

    }

    function login() {

        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }

</script>

</body>

</html>