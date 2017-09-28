
<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");
include("admin_content/connect.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | BnG</title>
<link rel="icon" type="image/png" href="css/thumbnail.png">

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
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php 
					if(!isset($_SESSION['email'])){
					
					echo "<li><a href='checkout.php'><i class='fa fa-lock'></i>Login</a></li>";
					
					}
					else {
					echo "<li><a href='logout.php'><i class='fa fa-lock'></i>Logout</a></li>";
					}
					
					
					
					?>
								<li><a href="register.php">Signup</a></li>
							</ul>
						</div>
						<?php 
					if(isset($_SESSION['email'])){
					echo "<b>Welcome:</b>" . $_SESSION['email'] ;
					}
					else {
					echo "<b>Welcome Guest!</b>";
					}
					?>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="header-middle"><!--header-middle-->
			<!--<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/logo.PNG" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="checkout.php"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="register.php"> Signup</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>-->

	
	
			

			<?php 
				if(!isset($_SESSION['email'])){
					
					include("login.php");
				}
				else {
					/*global $conn;
				if(isset($_POST['checkout'])){
		
			
			
			$delete_product = "delete from cart";
			
			$run_delete = mysqli_query($conn, $delete_product); 
				}*/
				include("payment.php");
				
				
				}
				
				?>
	

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

			
			
			
</html>