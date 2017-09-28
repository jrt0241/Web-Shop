<?php 

include("connect.php");

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | BnG</title>
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
							<a href="index.php"><img src="images/logo.png"  width="274" padding-top: 50px alt="" /></a>
						</div>
						
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
</header><!--/header-->
<div align="center">
<table width="1000" align="middle" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View all orders here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Product</th>
		<th>Desc</th>
<th>Quantity</th>
		<th>Invoice No</th>
		<th>Order Date</th>
		<th>Action</th>
	</tr>
	<?php 
	
	
	$get_order = "select * from Orders";
	
	$run_order = mysqli_query($conn, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		 $pro_id= $row_order['p_id'];
		
		$c_id = $row_order['c_email'];
                $qty = $row_order['Quantity'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$i++;
		
		$get_pro = "select * from products_books where product_id='$pro_id'";
		$run_pro = mysqli_query($conn, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
		
		$get_c = "select * from signup where customer_id='$c_email'";
		$run_c = mysqli_query($conn, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['customer_email'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><img src=<?php echo $pro_image;?> width="100" height="100"/></td>
		<td>
		<?php echo $pro_title;?><br>
		
		
		<td><?php echo $qty;?></td>
		<td><?php echo $invoice_no;?></td>
		<td><?php echo $order_date;?></td>
		<td><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete Order</a></td>
	
	</tr>
</div>
	<?php } ?>
</table>
