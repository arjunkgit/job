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
$emphistory = $_POST["emphistory"];
$workedCompany = $_POST["workedCompany"];
$workedYear = $_POST["workedYear"];
$workedMonth = $_POST["workedMonth"];
$workedJoinDate = $_POST["workedJoinDate"];
$workedEndDate = $_POST["workedEndDate"];
$workedCurrentJob = $_POST["workedCurrentJob"];

$sql = "INSERT INTO  `emphistory` (email,emphistory,workedCompany,workedYear,workedMonth,workedJoinDate,workedEndDate,workedCurrentJob) VALUES ('$email', '$emphistory', '$workedCompany','$workedYear','$workedMonth','$workedJoinDate','$workedEndDate','$workedCurrentJob' )";

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
$sql = "DELETE  from `emphistory` where `id` = $id";
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

$empHistoryColName = "emphistory";
$sql = "UPDATE emphistory set ".$empHistoryColName."='".$empUpdateVal."' WHERE id='".$editEmpId."'";
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

$sql = "INSERT INTO  `projecthistory` (email,projectTitle,client,duration,projectDetails) VALUES ('$email', '$projectHistoryTitle', '$projectHistoryClient','$projectHistoryDuration','$projectHistoryProjectDetails')";
	
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
$sql = "DELETE  from `projecthistory` where `id` = $id";
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
$sql = "UPDATE candidateregdata set ".$activatePro."='".$activateProValue."',".$deactivatePro."='".$deactivateProValue."' WHERE email='".$email."'";
if ($con->query($sql) === TRUE) {
//    echo "Your account has been activated successfully";
    header("Location: ../dashboard.php#/accountSettings");
//	header("refresh:1; url=../dashboard.php#/accountSettings"); 
	exit;
} else {
//    echo "Error in account settings. Please try again.";
    header("Location: ../dashboard.php#/accountSettings");
//	header("refresh:2; url=../dashboard.php#/accountSettings"); 
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
$sql = "UPDATE candidateregdata set ".$activatePro."='".$activateProValue."',".$deactivatePro."='".$deactivateProValue."' WHERE email='".$email."'";
if ($con->query($sql) === TRUE) {
//    echo "Your account has been Deactivated successfully";
    header("Location: ../dashboard.php#/accountSettings");
//	header("refresh:2; url=../dashboard.php#/accountSettings"); 
	exit;
} else {
//    echo "Error in account. Please try again.";
    header("Location: ../dashboard.php#/accountSettings");
//	header("refresh:1; url=../dashboard.php#/accountSettings"); 
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
$sql = "UPDATE candidateregdata set ".$deletePro."='".$deleteProValue."' WHERE email='".$email."'";
if ($con->query($sql) === TRUE) {
	//echo "Currently the account deleting facility has been disabled. Contact admin for more details.";
	//exit;
	$email = $_SESSION["username"];	
	if(empty($email)) throw new Exception( "Invalid User." );
	$query = "DELETE FROM candidateregdata WHERE `email` = '$email'";
	$query2 = "DELETE FROM defaultvalues WHERE `email` = '$email'";
	$query3 = "DELETE FROM jobsapplied WHERE `userEmail` = '$email'";
	$query4 = "DELETE FROM emphistory WHERE `email` = '$email'";
	$query5 = "DELETE FROM 	projecthistory WHERE `email` = '$email'";

	if (mysqli_query($con, $query)) {
		mysqli_query($con, $query2);
		mysqli_query($con, $query3);
		mysqli_query($con, $query4);
		mysqli_query($con, $query5);
		echo "Your account has been deleted successfully";
	} else {
		echo "Error in deleting record";
	}
		header("refresh:4; url=../logout.php"); 
		exit;
} else {
  echo "Error in deleting your account.";
//    header("Location: ../dashboard.php#/accountSettings");
	header("refresh:1; url=../dashboard.php#/accountSettings"); 
	exit;
}
mysqli_close($con);
}

// **************** Add applied jobs ***************
function addAppliedJobs ($urlParams) {
require_once("db.php");
$email = $_SESSION["username"];
$appliedJobID = $_POST["appliedJobID"];
$jobsPostedBy = $_POST["jobsPostedBy"];
$sql = "INSERT INTO  `jobsapplied` (userEmail,jobsPostId,jobsPostedBy) VALUES ('$email', '$appliedJobID', '$jobsPostedBy')";	
if ($con->query($sql) === TRUE) {
    echo "success";
	header("refresh:1; url=/job/currentOpenings.php"); 
	exit;
} else {
    echo "error";
	header("refresh:1; url=/job/currentOpenings.php"); 
	exit;
}
mysqli_close($con);
}



// *************** Redirect based on login type ***************
function redirectLoginAs($urlParams){
	require_once("db.php");
	$loginEmail = $urlParams[4];
	$loginType = $urlParams[5];
	$adminEmail = "";
	if(isset($_SESSION["adminusername"])){
		$adminEmail = $_SESSION["adminusername"];
	}else{
		$adminEmail = "na";
	}
	if(isRowAvailable('adminregdata',$adminEmail, $con) == true){
		if($loginType == "candidate"){
			if(isRowAvailable('candidateregdata', $loginEmail, $con) == true){
				unset($_SESSION['adminusername']);
				$_SESSION['username'] = $loginEmail ;
				header("Location: ../../../dashboard.php");
			}else{
				echo "Invalid candidate request";
			}

		}else if($loginType == "employer"){
			if(isRowAvailable('employerregdata', $loginEmail, $con) == true){
				unset($_SESSION['adminusername']);
				$_SESSION['empusername'] = $loginEmail;
				header("Location: ../../../dashboard.php");
			}else{
				echo "Invalid employer request";
			}
		}else{

		}
		
	 }else{
		 echo "You are not authorised to access this facility";
	 }
}

function isRowAvailable($_tableName, $_whereCondition , $_con){
	
	$tableName = $_tableName;
	$whereCondition = $_whereCondition;
	$con = $_con;
	$checkEmail = "SELECT * FROM `$tableName` WHERE email='$whereCondition' ";
	
	$checkResult = mysqli_query($con,$checkEmail);
	$checkRow = mysqli_num_rows($checkResult);
	echo $checkEmail;
	echo $checkRow;
	if($checkRow == 1){
		return true;
	}else{
		return false;
	}
}
?>


