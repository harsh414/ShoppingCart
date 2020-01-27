
<?php
session_start();
require_once('./php/component.php');


if (isset($_POST['add']))
{
 // print_r($_POST['product_id']);
    if(isset($_SESSION['cart']))
    {
        $items_array_id = array_column($_SESSION['cart'], "product_id");
        /*if(in_array(needle, haystack)) where needle is the item you're searching for , the haystack is what the needle is located within  */
        if(in_array($_POST['product_id'], $items_array_id)) 
        {
            echo '<script>alert("Item Already Added")</script>';
        }else
        {
            $count=0;
            $count=count($_SESSION['cart']);
            $items_array= array(
            'product_id' => $_POST['product_id']
        );
            $_SESSION['cart'][$count]=$items_array;

        }
    }
    else
    {
        $items_array= array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0]=$items_array;
    }


}



?> 
<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!-- Bootstrap link rel -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="./upload/style.css">

    <title>Shopping Cart</title>
</head>
<body>
   <?php require_once('./php/header.php'); ?>
   <div class="row text-center py-5">
     <?php
     $conn= mysqli_connect("localhost","root","","producttb");
     $query= "SELECT * FROM `producttb`";
     $result= mysqli_query($conn,$query);
     while ($row = mysqli_fetch_assoc($result)){
        component($row['product_name'], $row['price_before'],$row['product_price'], $row['product_image'],$row['uid']);
    }
    ?>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>