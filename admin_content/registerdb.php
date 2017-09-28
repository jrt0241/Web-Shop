<?php
session_start();

try
{
	global $conn; 
		 

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
   $result = mysql_query("insert into admins(user_email,user_password) values('$Email','$pass')");
 
  
		
		
		
		//$_SESSION['email']=$Email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
	
		
   
		
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