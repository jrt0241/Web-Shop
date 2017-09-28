<html>
<!DOCTYPE>
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
<div align="center" >
<table width="1000" align="middle" bgcolor="#608341"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
               
		<th>Image</th>
		<th>Price</th>
	
		<th>Delete</th>
	</tr>
	<?php 
	include("connect.php");
	
	$get_pro = "select * from products_books";
	
	$run_pro = mysqli_query($conn, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
                $pro_desc = $row_pro['product_desc'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $pro_title;?></td>
                
		<td><img src=<?php echo $pro_image;?> width="100" height="100"/></td>
		<td><?php echo $pro_price;?></td>
		
		<td><a href="deleteproduct.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
	
	</tr>
</div>
	<?php } ?>
</table>
</html>