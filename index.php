<!DOCTYPE html>
<?php session_start(); 

include("functions/function.php");
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | BnG</title>
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
								<!--<li><a href="checkout.php"><i class="fa fa-lock"></i> Login</a></li>-->
								<?php 
					if(!isset($_SESSION['email'])){
					
					echo "<li><a href='checkout.php'><i class='fa fa-lock'></i>Login</a></li>";
					
					}
					else {
					echo "<li><a href='logout.php'><i class='fa fa-lock'></i>Logout</a></li>";
					}
					
					
					
					?>
								<li><a href="register.php"> Signup</a></li>
							</ul>
						</div>
						
					
			
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li ><a href="books.php">Books</a>
                                    
                                </li> 
								<li ><a href="gadgets.php">Gadgets</a>
                                    
                                </li> 
								
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>

					</div>
<div class="col-sm-3">
					<b "style:pading-top:15px">Total Items:<?php echo total_items();?></b>
						<div class="search_box pull-right">
						<form method="get" action="results.php">
							<input type="text" name="search" placeholder="Search"/></form>
						</div>
					</div>

					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								
								
									<img src="images/home/slider1.jpg" class="girl img-responsive" alt="" />
									
								
							</div>
							<div class="item">
								
								
									<img src="images/home/slider2.jpg" class="girl img-responsive" alt="" />
							
								
							</div>
							
							<div class="item">
								
								
									<img src="images/home/slider3.jpg" class="girl img-responsive" alt="" />
									
								
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
<section><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

				<h2 class="title text-center">New Arrivals</h2>

        <?php getProindex(); ?>
<?php cartindex();?>
</div></div></div></section>

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>