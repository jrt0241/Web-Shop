<?php
if(isset($_SESSION['email'])){
session_start();
?>

<div>

<?php 
	
      include("functions/function.php");
	  include("admin_content/connect.php");
		$total = 0;
		
		global $conn; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ipaddr='$ip'";
		
		$run_price = mysqli_query($conn, $sel_price); 
                 
                 
		
while($p_price = mysqli_fetch_array($run_price)){
			
	$pro_id = $p_price['p_id']; 
     // $product_name = $p_price['product_title'];
			
	$pro_price = "select * from products_books where product_id='$pro_id'";
			
	$run_pro_price = mysqli_query($conn,$pro_price); 
			
	while ($pp_price = mysqli_fetch_array($run_pro_price)){
		$product_name = $pp_price['product_title'];	
	$product_price = array($pp_price['product_price']);
		
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
			
			}


?>
<h2 style="padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pay now with Paypal:</h2>

<form action="https://www.sandbox.paypal.com/us/cgi-bin/webscr" method="post" >

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="bbnngg@gmail.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
<input type="hidden" name="item_number" value="<?php echo $pro_id; ?>">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="hidden" name="quantity" value="<?php echo $qty; ?>">
<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="return" value="http://students.cse.unt.edu/~ks0593/Eshopper/paypal_success.php"/>
<input type="hidden" name="cancel_return" value="http://students.cse.unt.edu/~ks0593/Eshopper/payment_failed.php"/>

<!-- Display the payment button. -->
<div class="row">

<div class="col-sm-12">
<div class="col-sm-4"></div>
<div class="col-sm-4">

<input type="image" name="submit" border="0"  align="center"
src="http://students.cse.unt.edu/~ks0593/Eshopper/images/checkout.png"
alt="PayPal - The safer, easier way to pay online"/></div>
<div class="col-sm-4">
</div>
</div>
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

</div>
	<?php }?>