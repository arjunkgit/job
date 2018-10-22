<?php
session_start();
require_once("db.php");
$col = $_POST["column"];
$edit = $_POST["editval"];
$myid = $_SESSION['username'];
$sql = "UPDATE candidateRegData set ".$col."='".$edit."' WHERE email='".$myid."'";
if ($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

/*
if ($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
*/

//$resume = $_FILES["resume"]["name"];
//$dat=date('y/m/d');
//<input type="file" name="resume" id="resume" style="width:295px" />
?>