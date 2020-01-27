<?php
session_start();
require_once('./php/component.php'); 
if(isset($_POST['remove'])){
	if($_GET['action']=='remove'){
		foreach ($_SESSION['cart'] as $key => $value) {
		{
			if($value['product_id']==$_GET['id']){
				unset($_SESSION['cart'][$key]);
			}
		}
	}
}}
		

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
	<style>
		.spaceplz{
			margin-top: 4rem;
			box-shadow: 0 7px 4px #777;
			border-top: #eee;
		}
     </style>
</head>


<body>
	<?php
	require_once('php/header.php');
	?>
	<div class="container-fluid my-2">
	<div class="row px-5">
	<div class="col-sm-7">
			<h6>My cart</h6>
			<hr>
		
		<?php
      if(isset($_SESSION['cart']))
      {
      	$total=0;
		$pro_id=array_column($_SESSION['cart'], 'product_id');
		$conn=mysqli_connect("localhost","root","","producttb");
		 $query= "SELECT * FROM `producttb`";
         $result= mysqli_query($conn,$query);
		while($row= mysqli_fetch_assoc($result)){
			 foreach ($pro_id as $product_id => $uid) {
			if($row['uid'] == $uid){
			cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['uid']);
			$total= $total+ (int)$row['product_price'];
		}}}
	  }else
	  {
	  	echo "CART IS EMPTY !!!!";
	  }
		?>	
	</div>
	<hr>

	<div class="col-sm-6 d-block spaceplz">
	<div class="container w-75">
	<h6>PRICE DETAILS &nbsp &nbsp &nbsp &nbsp</h6>
    <h6 class="pb-3"><?php echo "$$total"?></h6>
    </div>

    <div class="container w-75">
	<h6>Delivery charges &nbsp &nbsp &nbsp &nbsp</h6>
	<h6 class="text-success pb-3">FREE</h6>
    <hr>
    </div>

    <div class="container w-75">
	<h6> Amount Payable &nbsp &nbsp &nbsp &nbsp</h6>
    <h6 class="pb-3"><?php echo "$$total"?></h6>
    </div>
   
    </div>
	</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
