<?php
session_start();
include("functions/function.php");

include("admin_content/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | BnG</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>


	<header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="cart.php" class="active"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php 
					if(!isset($_SESSION['email'])){
					
					echo "<li><a href='checkout.php'><i class='fa fa-lock'></i>Login</a></li>";
					
					}
					else {
					echo "<li><a href='logout.php'><i class='fa fa-lock'></i>Logout</a></li>";
					}
					
					
					
					?>
								<li><a href="register.php"><i class="fa fa-lock"></i> Signup</a></li>
							</ul>
						</div>
						<?php 
					if(isset($_SESSION['email'])){
					echo "<b>Welcome:</b>" . $_SESSION['email'] ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
<form action="cart.php" method="post">
	<section id="cart_items">
		<div class="container">
			
<?php cart(); ?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product</td>
							<td Style="font-size:5";>Product Name</td>
							<td class="quantity">Quantity</td>
							<td class="total">Price</td>
							<td Style="font-size:5";>Delete</td>
							<td></td>
						</tr>
					</thead>
					<?php 
		$total = 0;
		
		global $conn; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ipaddr='$ip'";
		
		$run_price = mysqli_query($conn, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "select * from products_books where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($conn,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			$values = array_sum($product_price); 
			
			$total += $values; 
					
					?>

					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo $product_image;?>" width="150" height="200" alt=""></a>
							</td>
							<td class="cart_description">
								<?php echo $product_title;?></a>
								
							</td>
							
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<p><input type="text" size="4" name="quantity" value="<?php echo $quantity;?>"/></p>
									
								</div>
							</td>
							<?php 
						if(isset($_POST['update_cart'])){
						
							$quantity = $_POST['quantity'];
							
							$update_qty = "update cart set quantity='$quantity'";
							
							$run_qty = mysqli_query($conn, $update_qty); 
							
							//$_SESSION['quantity']=$quantity;
							
							$total = $total*$quantity;
						}
						
						
						?>
							<td class="cart_price">
								<p><?php echo $single_price;?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"></p>
							</td>
							<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
							<!--<td class="cart_delete">
								<a class="cart_quantity_delete" name="delete" href="cart.php?value=<?php echo $pro_id;?>" onclick="return confirm("Are you sure?");"><i class="fa fa-times"></i></a>
							</td>-->
						</tr>

						<?php $tax=$total*0.02;} } ?>
					
					</tbody>
	<td colspan="4" align="center"><input type="submit" name="update_cart" value="Update Cart"/></td>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
</form>

<?php 

		$ip = getIp();
		
		/*if(isset($_POST['delete'])){
		
			 $remove_id = $_POST['delete'] ;
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ipaddr='$ip'";
			
			$run_delete = mysqli_query($conn, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}*/


			if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ipaddr='$ip'";
			
			$run_delete = mysqli_query($conn, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
		
		}
		/*if(isset($_POST['checkout'])){
		
			
			
			$delete_product = "delete from cart";
			
			$run_delete = mysqli_query($conn, $delete_product); 
			
			if($run_delete){
			
			//echo "<script>window.open('cart.php','_self')</script>";
			echo "items removed from cart";
			
			}
			
			
		
		}*/
		
					
	?>

	<section id="do_action">
		<div class="container">
			
			
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php echo $total?></span></li>
							
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo $total?></span></li>
						</ul>
							<a class="btn btn-default update" href="index.php">Continue Shopping</a>
							<a class="btn btn-default check_out" name="checkout" href="checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>