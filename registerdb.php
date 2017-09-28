<?php
session_start();
include("functions/function.php");
try
{
	global $conn; 
		$ip = getIp(); 
	$FirstName=$_POST["FirstName"];
	$LastName=$_POST["LastName"];
	$Email=$_POST["Email"];
	$Password= $_POST["Password"];
	$pass= sha1($Password);
	//$hashed_Password=crypt($Password);
	//$Password=hash_hmac('sha512',$Password,'secret');
	//$mobile=$_POST["mobile"];
	$hostname="student-db.cse.unt.edu";
	$user="ks0593";
	$pwd="SecurebngI";
	
	if($conn1=mysql_connect($hostname,$user,$pwd))
	{
	$conn2=mysql_select_db("ks0593");
   $result = mysql_query("insert into signup(ipaddr,firstName,lastname,email,password) values('$ip','$FirstName','$LastName','$Email','$pass')");
   if($result)
   {
   $sel_cart = mysql_query("select * from cart where ipaddr='$ip'");
		
		//$run_cart = mysql_query($con, $sel_cart); 
		
		$check_cart = mysql_num_rows($sel_cart); 
		
		if($check_cart==0){
		
		//$_SESSION['email']=$Email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('login.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['email']=$Email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
   }
   else{
	   $_SESSION['regerrors']=array(mysql_error());
	   header("location:register.php");
   }
   

}
else{
			throw new exception("connection not established");
		}
	
}
catch(Exception $ex)
{
	echo $ex->getmessage();
}

mysql_close($conn);

?>