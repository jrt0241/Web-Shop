
<?php 
session_start();
include("functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="icon" type="image/png" href="css/thumbnail.png">

    <title>Shop | BnG</title>
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
								<li><a href="register.php"> Signup</a></li>
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
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="books.php" >Books</a>
                      
                                </li> 
								<li class="dropdown"><a href="gadgets.php" >Gadgets</a>
                                   
                                </li> 
								
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>
	
		
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<ul id="cats">
							
								<?php get_Catg();?>
								
								</ul>	
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php 
	

	
	$search_query = $_GET['search'];
	
	$get_pro = "select * from products_gadgets where product_keywords like '%$search_query%'";

	$run_pro = mysqli_query($conn, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "<div class='col-sm-4'>"; 
            echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
            echo "<div class='productinfo text-center'>";
            echo "<img src='$pro_image' width='180' height='180' />";
            echo "<h2>$ $pro_price </h2>";
			echo "<p>$pro_title</p>";
            echo "<a href='details.php?pro_id=$pro_id' class='btn btn-default add-to-cart'></i>Details</a>";
echo "<a href='gadgets.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";	
		
	
	}
		?>
				</div>
			</div>
		</div>
	</section>
	
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>