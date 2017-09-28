<?php
session_start();
?>
<html>
<head>
<title> Payment Successful </title>
</head>
<body>
    
    
<?php 
		include("admin_content/connect.php");
		include("functions/function.php");
		
		//this is all for product details
		
		$total = 0;
		
		global $conn; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ipaddr='$ip'";
		
		$run_price = mysqli_query($conn, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "select * from products_books where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($conn,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_id = $pp_price['product_id'];
			
			$pro_name = $pp_price['product_title'];
			
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			}
		
		
		}
		
			// getting Quantity of the product 
			$get_qty = "select * from cart where p_id='$pro_id'";
			
			$run_qty = mysqli_query($conn, $get_qty); 
			
			$row_qty = mysqli_fetch_array($run_qty); 
			
			$qty = $row_qty['quantity'];
			
			if($qty==0){
			
			$qty=1;
			}
			else {
			
			$qty=$qty;
			
			$total = $total*$qty;
			
			}
			
			// this is about the customer
			$user = $_SESSION['email'];
				
			$get_c = "select * from signup where email='$user'";
				
			$run_c = mysqli_query($conn, $get_c); 
				
			$row_c = mysqli_fetch_array($run_c); 
				
			//$c_id = $row_c['customer_id'];
			$c_email = $row_c['email'];
			$c_name = $row_c['firstname']; 
			
			//payment details from paypal
			
			$amount = $_GET['amt']; 
			
			$currency = $_GET['cc']; 
			
			$trx_id = $_GET['tx']; 

			$invoice = mt_rand();
				
				//inserting the payment to table 
				$insert_payment = "insert into payments (amount,c_email,product_id,trx_id,currency,payment_date) values ('$amount','$c_email','$pro_id','$trx_id','$currency',NOW())";
				
				$run_payment = mysqli_query($conn, $insert_payment); 
				
				// inserting the order into table
				$insert_order = "insert into Orders (p_id, c_email, Quantity, invoice_no,status,order_date) values ('$pro_id','$c_email','$qty','$invoice','in Progress',NOW())";
				$run_order = mysqli_query($conn, $insert_order); 
				
				//removing the products from cart
				$empty_cart = "delete from cart";
				$run_cart = mysqli_query($conn, $empty_cart);
				
				
				
		
		
		echo "<h2>Welcome:" . $_SESSION['customer_email']. "<br>" . "Your Payment was successful!</h2>";
		echo "<a href='http://students.cse.unt.edu/~ks0593/Eshopper/account.php'>Go to your Account</a>";
		
		
		
		
		
			
				

?>





</body>