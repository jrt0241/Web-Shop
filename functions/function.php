<?php
$hostname="student-db.cse.unt.edu";
	$user="ks0593";
	$pwd="SecurebngI";
	$db="ks0593";
	/*$hostname="localhost";
	$user="keerthana";
	$pwd="";
	$db="bng";*/
$conn=mysqli_connect($hostname,$user,$pwd,$db);


 function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
function cart(){

if(isset($_GET['add_cart'])){

	global $conn; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where p_id='$pro_id' AND ipaddr='$ip'";
	
	$run_check = mysqli_query($conn, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (p_id, ipaddr) values ('$pro_id','$ip')";
	
	$run_pro = mysqli_query($conn, $insert_pro); 
	
	echo "<script>window.open('books.php','_self')</script>";
	}
	
}

}
function cart1(){

if(isset($_GET['add_cart'])){

	global $conn; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where p_id='$pro_id' AND ipaddr='$ip'";
	
	$run_check = mysqli_query($conn, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (p_id, ipaddr) values ('$pro_id','$ip')";
	
	$run_pro = mysqli_query($conn, $insert_pro); 
	
	echo "<script>window.open('gadgets.php','_self')</script>";
	}
	
}

}
function cartindex(){

if(isset($_GET['add_cart'])){

	global $conn; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where p_id='$pro_id' AND ipaddr='$ip'";
	
	$run_check = mysqli_query($conn, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (p_id, ipaddr) values ('$pro_id','$ip')";
	
	$run_pro = mysqli_query($conn, $insert_pro); 
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	
}

}


  
  function total_items(){
 
	if(isset($_GET['add_cart'])){
	
		global $conn; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where ipaddr='$ip'";
		
		$run_items = mysqli_query($conn, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
		
		else {
		
		global $conn; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where ipaddr='$ip'";
		
		$run_items = mysqli_query($conn, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
	
	echo $count_items;
	}
function get_Catb()
{
	global $conn;
	$get_catb="select * from categories_books where type='books'";
	$run_catb=mysqli_query($conn,$get_catb);
	while($row_catb=mysqli_fetch_array($run_catb))
	{
		$cat_bid=$row_catb['cat_bid'];
		$cat_btitle=$row_catb['cat_btitle'];
		echo "<li><a href='books.php?catb=$cat_bid'>$cat_btitle</a></li>";
	}
}
function get_Catg()
{
	global $conn;
	$get_catg="select * from categories_gadgets ";
	$run_catg=mysqli_query($conn,$get_catg);
	while($row_catg=mysqli_fetch_array($run_catg))
	{
		$cat_gid=$row_catg['cat_gid'];
		$cat_gtitle=$row_catg['cat_gtitle'];
		echo "<li><a href='gadgets.php?catg=$cat_gid'>$cat_gtitle</a></li>";
	}
}
function getPro(){

if(!isset($_GET['catb'])){

	global $conn; 
	
	$get_pro = "select * from products_books where type='books'";

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
echo "<a href='books.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";	
		
	
					//<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					//<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
	}
	
}
}
function getaccessories(){

if(!isset($_GET['catb'])){

	global $conn; 
	
	$get_pro = "select * from products_books where type='accessories' order by RAND() LIMIT 0,5";

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
		

	
					//<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					//<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
	}
	
}
}
function getbookaccessories(){

if(!isset($_GET['catb'])){

	global $conn; 
	
	$get_pro = "select * from products_books where type='bookaccessories' order by RAND() LIMIT 0,5";

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
echo "<a href='books.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";	
		

	
					//<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					//<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
	}
	
}
}


function getProindex()
{


	global $conn; 
	
	$get_pro = "select * from products_books where type IN ('books','gadgets') order by RAND() LIMIT 0,8";

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
echo "<a href='books.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";	
		
	
					//<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					//<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
	}
	

}


function getCatPro(){

	if(isset($_GET['catb'])){
		
		$cat_id = $_GET['catb'];

	global $conn; 
	
	$get_cat_pro = "select * from products_books where product_cat='$cat_id'";

	$run_cat_pro = mysqli_query($conn, $get_cat_pro); 
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
	
	echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
	
	}
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
	echo "<div class='col-sm-4'>"; 
            echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
            echo "<div class='productinfo text-center'>";
            echo "<img src='$pro_image' width='180' height='180' />";
            echo "<h2>$ $pro_price </h2>";
			echo "<p>$pro_title</p>";
            echo "<a href='details.php?pro_id=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Details</a>";
echo "<a href='books.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";
		
		
	
	}
	
}

}
function getProg(){

if(!isset($_GET['catg'])){

	global $conn; 
	
	$get_pro = "select * from products_books where type='gadgets'";

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
            echo "<a href='detailsg.php?pro_id=$pro_id' class='btn btn-default add-to-cart'></i>Details</a>";
echo "<a href='gadgets.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";	
		
	
					//<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					//<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
	}
	
}
}

function getCatgPro(){

	if(isset($_GET['catg'])){
		
		$cat_id = $_GET['catg'];

	global $conn; 
	
	$get_cat_pro = "select * from products_books where product_cat='$cat_id'";

	$run_cat_pro = mysqli_query($conn, $get_cat_pro); 
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
	
	echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
	
	}
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
	echo "<div class='col-sm-4'>"; 
            echo "<div class='product-image-wrapper'>";
			echo "<div class='single-products'>";
            echo "<div class='productinfo text-center'>";
            echo "<img src='$pro_image' width='180' height='180' />";
            echo "<h2>$ $pro_price </h2>";
			echo "<p>$pro_title</p>";
            echo "<a href='detailsg.php?pro_id=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Details</a>";
echo "<a href='gadgets.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to Cart</a>";
			echo "</div>"; 
           echo "</div>";
			
			echo "</div>";
			echo "</div>";
		
		
	
	}
	
}

}
?>