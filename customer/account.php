<!DOCTYPE>
<?php 
session_start();
include("functions/function.php");

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | BnG</title>
<link rel="icon" type="image/png" href="css/thumbnail.png">

    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/font-awesome.min.css" rel="stylesheet">
    <link href="styles/prettyPhoto.css" rel="stylesheet">
    <link href="styles/price-range.css" rel="stylesheet">
    <link href="styles/animate.css" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
	<link href="styles/responsive.css" rel="stylesheet">
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
							<a href="index.html"><img src="images/logo.PNG" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="register.html"> Signup</a></li>
							</ul></div>
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
			
			
			
			<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Your Account</h2>
						<ul id="cats">
							
								<li><a href="my_account.php?my_orders">My Orders</a></li>
                                                                <li><a href="my_account.php?my_orders">My Orders</a></li>

                                                                <li><a href="my_account.php?my_orders">My Orders</a></li>

                                                                <li><a href="my_account.php?my_orders">My Orders</a></li>

								
								</ul>	
					</div>
				</div>
		</div><!--/header-middle-->