<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE> 


<html>
	<head>
<head>
   

		
                <title>This is Admin Panel</title>
                <link rel="icon" type="image/png" href="styles/thumbnail.png">
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>


<body> 


</div>
		
		<div id="right">
		<h2 style="text-align:center;">Manage Content</h2>
			
			<a href="index.php?insert_productbooks">Insert New Products</a>
			
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?vieworders">View Orders</a>
			                     
			<a href="logout.php">Admin Logout</a>
		
		</div>
		
		<div id="left">
		<h2 style="color:red; text-align:center;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo @$_GET['logged_in']; ?></h2>
                      	
	
		<?php 
		if(isset($_GET['insert_productbooks'])){
		
		include("insert_productbooks.php"); 
		
		}
		
		if(isset($_GET['view_products'])){
		
		include("viewproducts.php"); 
		
		}
           if(isset($_GET['vieworders'])){
		
		include("vieworders.php"); 
		
		}
     

		
		
		?>
		</div>



</div>
<div id="middle">
<img src="admin.png"/>
<h2><font color="orange">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHow Are You BnG Admin?</div>




</body>
</html>

<?php } ?>