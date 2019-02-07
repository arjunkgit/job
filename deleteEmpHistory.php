<?php 
session_start();

require_once("db.php");
$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE  from `emphistory` where `id` = $id";
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
?>
<div style="text-align: center;">
	<?php     echo "Record Deleted Successfully"; ?>
</div>
<?php
    header("refresh:1; url=dashboard.php"); 
    exit;
} else {
?>
<div style="text-align: center;">
	<?php echo "Error deleting record"; ?>
</div>
<?php
}
?>
