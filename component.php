<?php

function component($productname, $productprice, $productimg, $productid , $alert){
    if ($alert) {
        $code="alert('you are not logged in ......')";
        
        $sub = 'NONE';
        # code...
    }
    else{
        $code='';
        $sub = 'submit';
    }
    $element = sprintf("
    <div class=\"col-4\">
                <form action=\"Product.php\" method=\"post\">
                            <img src=\"$productimg\">
                            <h4>$productname</h4>
                            <div class=\"rating\">
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star-o\"></i>
                <i class=\"fa fa-star-o\"></i>
            </div>
                            <p>
                                <span class=\"price\">$$productprice</span>
                            </p>
    <button onclick=\"%s\" type=\"%u\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
  

                             <input type='hidden' name='product_id' value='$productid'>

                </form>
                </div>
    ",$code,$sub);
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"Cart1.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
    <tr>
    <td>
        <div class=\"cart-info\">
                        
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <h5 class=\"pt-2\">$productname</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                </div>
                            </td>
                            <td><input type=\"number\" value=\"1\" min=\"1\" class=\"inp\" max=\"999\"></td>
                            <td><h5 class=\"pt-2 disp\">$$productprice</h5></td>
                            </tr>

                </form>
    
    ";
    echo  $element;
}
















