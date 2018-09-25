<!DOCTYPE HTML>
<html>
<head>
    <title>Actions</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="jobs" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row"> 
<div class="col-md-12" style="text-align: center;">
<h3>	
<?php
session_start();

//0 **************** Basic Format ***************
//--   1   2         3     4    5   
//-- /job/funcs.php/func2/arg1/arg2
//0 **************** Basic Structure ***************
$urlParams = explode('/', $_SERVER['REQUEST_URI']);
$functionName = $urlParams[3];
$functionName($urlParams);
/*
function func2 ($urlParams) {
    echo "In func2";
    echo "<br/>Argument 1 -> ".$urlParams[4];
    echo "<br/>Argument 2 -> ".$urlParams[5];  
}
*/
// **************** All Variable ***************


// **************** Add Emp History ***************
function addEmpHistory ($urlParams) {
require_once("db.php");
$email = $_SESSION["username"];
$empHistory = $_POST["empHistory"];
$workedCompany = $_POST["workedCompany"];
$workedYear = $_POST["workedYear"];
$workedMonth = $_POST["workedMonth"];
$workedJoinDate = $_POST["workedJoinDate"];
$workedEndDate = $_POST["workedEndDate"];
$workedCurrentJob = $_POST["workedCurrentJob"];

$sql = "INSERT INTO  `empHistory` (email,empHistory,workedCompany,workedYear,workedMonth,workedJoinDate,workedEndDate,workedCurrentJob) VALUES ('$email', '$empHistory', '$workedCompany','$workedYear','$workedMonth','$workedJoinDate','$workedEndDate','$workedCurrentJob' )";

if ($con->query($sql) === TRUE) {
    echo "Record has been inseted successfully";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
} else {
    echo "Error in inserting a record";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
}
mysqli_close($con);
}
// **************** Delete Emp History ***************
function deleteEmpHistory ($urlParams) {
require_once("db.php");
$id = $urlParams[4];
$sql = "DELETE  from `empHistory` where `id` = $id";
if (mysqli_query($con, $sql)) {
	echo "Record Deleted Successfully";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
	}
	else {
 	echo "Error deleting record";
	}
mysqli_close($con);
}

// **************** Update Emp History ***************
function editEmpHistory ($urlParams) {
require_once("db.php");
$empUpdateVal = $_POST["empUpdateVal"];
$editEmpId = $_POST["editEmpId"];

$empHistoryColName = "empHistory";
$sql = "UPDATE empHistory set ".$empHistoryColName."='".$empUpdateVal."' WHERE id='".$editEmpId."'";
if ($con->query($sql) === TRUE) {
    echo "Record has been updated successfully";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
} else {
    echo "Error in updating record";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
}
mysqli_close($con);
}

// **************** Add Project History ***************
function addProjectHistory ($urlParams) {
require_once("db.php");
$email = $_SESSION["username"];
$projectHistoryTitle = $_POST["projectHistoryTitle"];
$projectHistoryClient = $_POST["projectHistoryClient"];
$projectHistoryDuration = $_POST["projectHistoryDuration"];
$projectHistoryProjectDetails = $_POST["projectHistoryProjectDetails"];

$sql = "INSERT INTO  `projectHistory` (email,projectTitle,client,duration,projectDetails) VALUES ('$email', '$projectHistoryTitle', '$projectHistoryClient','$projectHistoryDuration','$projectHistoryProjectDetails')";
	
if ($con->query($sql) === TRUE) {
    echo "Record has been inseted successfully";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
} else {
    echo "Error in inserting a record";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
}
mysqli_close($con);
}
// **************** Delete Project History ***************
function deleteProjectHistory ($urlParams) {
require_once("db.php");
$id = $urlParams[4];
$sql = "DELETE  from `projectHistory` where `id` = $id";
if (mysqli_query($con, $sql)) {
	echo "Record Deleted Successfully";
	header("refresh:1; url=/job/dashboard.php"); 
	exit;
	}
	else {
 	echo "Error deleting record";
	}
mysqli_close($con);
}

function func3 ($urlParams) {

}
// **************** Activate acc ***************
function activatePro() {
require_once("db.php");
$activatePro = "activatePro";
$activateProValue = 1;

$deactivatePro = "deactivatePro";
$deactivateProValue = 0;

$email = $_SESSION["username"];
$sql = "UPDATE candidateRegData set ".$activatePro."='".$activateProValue."',".$deactivatePro."='".$deactivateProValue."' WHERE email='".$email."'";
if ($con->query($sql) === TRUE) {
    echo "Your account has been activated successfully";
	header("refresh:1; url=../dashboard.php#/accountSettings"); 
	exit;
} else {
    echo "Error in account settings. Please try again.";
	header("refresh:2; url=../dashboard.php#/accountSettings"); 
	exit;
}
mysqli_close($con);
}
// **************** Deactivate acc ***************
function deactivatePro() {
require_once("db.php");
$deactivatePro = "deactivatePro";
$deactivateProValue = 1;

$activatePro = "activatePro";
$activateProValue = 0;

$email = $_SESSION["username"];
$sql = "UPDATE candidateRegData set ".$activatePro."='".$activateProValue."',".$deactivatePro."='".$deactivateProValue."' WHERE email='".$email."'";
if ($con->query($sql) === TRUE) {
    echo "Your account has been Deactivated successfully";
	header("refresh:2; url=../dashboard.php#/accountSettings"); 
	exit;
} else {
    echo "Error in account. Please try again.";
	header("refresh:1; url=../dashboard.php#/accountSettings"); 
	exit;
}
mysqli_close($con);
}
// **************** delete acc ***************
function deletePro() {
require_once("db.php");
$deletePro = "deletePro";
$deleteProValue = 0;

$email = $_SESSION["username"];
$sql = "UPDATE candidateRegData set ".$deletePro."='".$deleteProValue."' WHERE email='".$email."'";
if ($con->query($sql) === TRUE) {
echo "Currently the account deleting facility has been disabled. Contact admin for more details.";
//    echo "Your account has been Deleted successfully";
	header("refresh:4; url=../dashboard.php#/accountSettings"); 
	exit;
} else {
    echo "Error in deleting your account.";
	header("refresh:1; url=../dashboard.php#/accountSettings"); 
	exit;
}
mysqli_close($con);
}

?>
</h3>
</div>
</div>	
</div>
</body>
</html>
