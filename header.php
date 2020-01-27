
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header id="header">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a href="index.php" class="navbar-brand">
			<h3 class="px-3 py-1">
				<i class="fas fa-shopping-basket"><?php
				echo "Welcome";
				?></i>
			</h3></a>

			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mynav" area-expanded="false">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="mynav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="cart.php" class="nav-link active px-5">
						<i class="fas fa-shopping-cart">Cart</i>
						<?php
						if (isset($_SESSION['cart'])){
							$count = count($_SESSION['cart']);
							echo "<span id=\"cart_count\" class=\"text-warning bg-light\" style=\"padding: 0rem 0.7rem 0.1rem 0.7rem\" style=\"margin-right:1rem \">$count</span>";
						}else{
							echo "<span id=\"cart_count\" class=\"text-warning bg-light\" style=\"padding: 0rem 0.7rem 0.1rem 0.7rem\" style=\"margin-right:1rem \">0</span>";
						}
						?>	
					</a></li>
					
				</ul>
			</div>
		</nav>
	</header>
</body>
</html>
