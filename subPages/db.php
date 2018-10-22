<?php
$con = mysqli_connect("localhost","voqAdmin","voqAdmin@123","jobData");
//$con = mysqli_connect("sql111.byethost7.com","b7_20500777","vyapaka12345","b7_20500777_jobData");
// Check connection
if (mysqli_connect_errno())
  { 
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>