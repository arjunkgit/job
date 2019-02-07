<?php 
session_start();
require_once("db.php");
$email = $_SESSION["username"];
$emphistory = $_POST["emphistory"];
echo $emphistory;
// sql to insertData a record
$sql = "INSERT INTO  `emphistory` (email,emphistory) VALUES ('$email', '$emphistory')";
echo "<br>"; 
echo $sql;
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
?>
<div style="text-align: center;">
	<?php     echo "Record Inserted Successfully"; ?>
</div>
<?php
   // header("refresh:9; url=dashboard.php"); 
    exit;
} else {
?>
<div style="text-align: center;">
	<?php echo "Error in inserting a record"; ?>
</div>
<?php
}
?>
