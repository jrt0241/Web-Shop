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

<table width="1000" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View all payments here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Customer Email</th>
		<th>Product</th>
                <th>Desc</th>
		<th>Paid Amount</th>
		<th>Transaction ID</th>
		<th>Payment Date</th>
	</tr>
	<?php 
	
	
	$get_payment = "select * from payments";
	
	$run_payment = mysqli_query($conn, $get_payment); 
	
	$i = 0;
	
	while ($row_payment=mysqli_fetch_array($run_payment)){
		
		$amount = $row_payment['amount'];
		$trx_id = $row_payment['trx_id']; 
		$payment_date = $row_payment['payment_date'];
		$pro_id = $row_payment['product_id'];
		$c_id = $row_c['c_email'];
		
		$i++;
		
		$get_pro = "select * from products_books where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
		
			?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_id; ?></td>
<td><img src=<?php echo $pro_image;?> width="100" height="100"/></td>
		
<td>
		<?php echo $pro_title;?><br>
				</td>
		<td><?php echo $amount;?></td>
		<td><?php echo $trx_id;?></td>
		<td><?php echo $payment_date;?></td>
	
	</tr>
	<?php } ?>
</table>