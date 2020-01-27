<!DOCTYPE html>
<html>
<head>
    <style>
        .myd{
            margin: 1.2rem;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
function component($productname,$priceEarlier, $productprice, $productimg,$productid){
    $element = "
    
    <div class=\"col-md-2 col-sm-6 my-3 my-md-10 mx-3\">
    <form action=\"index.php\" method=\"post\">
    <div class=\"card shadow \" id=\"id\" >
    <div>
    <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
    </div>
    <div class=\"card-body\">
    <h5 class=\"card-title\">$productname</h5>
    <h6>
    <i class=\"fas fa-star\"></i>
    <i class=\"fas fa-star\"></i>
    <i class=\"fas fa-star\"></i>
    <i class=\"fas fa-star-half\"></i>
    <i class=\"far fa-star\"></i>
    </h6>
    <p class=\"card-text\">
    Some quick example text to build on the card.
    </p>
    <h5>
    <small><s class=\"text-secondary\">$$priceEarlier</s></small>
    <span class=\"price\">$$productprice</span>
    </h5>
    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
    <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
    </div>
    </div>
    </form>
    </div>
    ";
    echo $element;
}

function cartElement($productimg,$productname,$productprice,$productid){
    $element= "
                <form action=\"cart.php?action=remove&id=$productid\" method=\"post\">
            <div class=\"border rounded myd\">
            <div class=\"row bg-light\">


            <div class=\"col-md-3\">                                  
            <img src=\"$productimg\" class=\"img-fluid\">
            </div>

            <div class=\"col-md-6\">
            <h5 class=\"pt-2\">$productname</h5> 
            <small class=\"text-secondary\">Seller:TrustnCare Mobiles</small>
            <h5 class=\"pt-3\">$$productprice</h5>
            <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
            <button type=\"submit\" class=\"btn btn-primary\" name=\"remove\">Remove</button>
            </div>


            <div class=\"col-md-3\">
            <div class=\"py-5\">
            <button type=\"button\" class=\"btn btn-light border rounded-circle\" name=\"btn1\"><i class=\"fas fa-minus\"></i></button>
            <input type=\"text\" value=\"1\" class=\"form-control d-inline border w-25\">
            <button type=\"button\" class=\"btn btn-light border rounded-circle\" name=\"btn2\"><i class=\"fas fa-plus\"></i></button>
            </div>
            </div>



            </div>
        </form>
        ";
        echo $element;
}
?>

