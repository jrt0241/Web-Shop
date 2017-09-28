<?php 
// After uploading to online server, change this connection accordingly

//$conn = mysqli_connect("localhost","keerthana","","bng");
$conn = mysqli_connect("student-db.cse.unt.edu","ks0593","SecurebngI","ks0593");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>