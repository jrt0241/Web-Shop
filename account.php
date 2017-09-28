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
							<a href="index.php"><img src="images/logo.PNG" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
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
			
			
			
			<section>
		<div class="container">
			<div class="row">
             <div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Your Orders</h2>
						<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead align="right">
						<tr>
							<th>S No</th>
						     <th>Product Name</th>
							<th>Product Image</th>
							<th>Quantity</th>
							<th>Invoice No</th>
							<th>Order Date</th>
						</tr>
					</thead>
					<?php 
	include("admin_content/connect.php");
	
	$user=$_SESSION['email'];
	
	$get_order = "select * from Orders where c_email='$user' ";
	
	$run_order = mysqli_query($conn, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['Quantity'];
		$pro_id = $row_order['p_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$i++;
		
		$get_pro = "select * from products_books where product_id='$pro_id'";
		$run_pro = mysqli_query($conn, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td>
		<?php echo $pro_title;?>
		
		</td>
		<td> <img src="<?php echo $pro_image;?>" width="50" height="50" /></td>
		<td><?php echo $qty;?></td>
		<td><?php echo $invoice_no;?></td>
		<td><?php echo $order_date;?></td>		
	
	</tr>

	<?php } ?>
     
<tr align="center">
<td></td><td></td>

<td>

<a class="btn btn-default update" href="index.php">Continue Shopping</a></tr></td><td></td>
        

	<td></td>				
		</div><!--/header-middle-->
</section></div></div>
</div></div></div>



	