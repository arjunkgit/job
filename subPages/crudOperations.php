<?php 
session_start();
if (isset($_SESSION["username"])){
	handleUserData();
}else if (isset($_SESSION["adminusername"])){
	handleAdminData();
} else if (isset($_SESSION["empusername"])){
	if( isset($_POST['type']) && !empty($_POST['type'] )){
		handleEmpData();
	}
	else{
		invalidRequest(); 
	}
}
else{
	echo "Please login !";	
}

function handleUserData(){
	if (isset($_SESSION["username"])){
		echo "User Logged in, Cant handle the request";
	}
}


function handleEmpData(){
	$type = $_POST['type'];
	if(isset($_POST['user']['jobId'])){
		$jobId = $_POST['user']['jobId'];
	}else{
		$jobId = "";
	}

	switch ($type) {
	case "saveData":
		saveData();
		break;
	case "deleteData":
		deleteData($jobId);
		break;
	case "getData":
		getData();
		break;
	case "saveUserData":
		saveUserData();
		break;
	default:
		invalidRequest();
	}
}

function handleAdminData(){
	$type = $_POST['type'];
	$jobId = $_POST['user']['email'];
	switch ($type) {
	case "insertData":
		insertData();
		break;
	case "deleteData":
		deleteData($jobId);
		break;
	case "getData":
		getData();
		break;
	default:
		invalidRequest();
	}	
}

function invalidRequest(){
	echo "Invalid Reqest recieved, Please check again.";	
}

function saveUserData(){
	require_once ("db.php");
	$tableName = $_POST['tableName'];
	$email = $_POST['user']['userEmail'];
	$empEmail = $_SESSION["empusername"];
	$username = $_POST['user']['userName'];
		
	$password = stripslashes($_POST['user']['userPass']);
	$password = mysqli_real_escape_string($con,$password);
	$checkEmail = "SELECT * FROM `candidateRegData` WHERE email='$email'";
	$checkResult = mysqli_query($con,$checkEmail);
	$checkRow = mysqli_num_rows($checkResult);
	if($checkRow==1){
		echo "This User already registered";
	 } 
	else{	
		$empusername = $_SESSION['empusername'];	
		$query1 = "SELECT `createNewEmpLimit`  FROM defaultValues WHERE `email`='$empusername'";		
		$jobsPosted = "SELECT `createdBy` FROM candidateRegData WHERE `createdBy` = '$empusername'";
		$result = mysqli_query($con, $query1);
		$resultPostedJobs = mysqli_query($con, $jobsPosted);
		$limitData = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($resultPostedJobs) >= $limitData['createNewEmpLimit']   ){
			echo "You have exceded the Job Post Limit. Please contact your Admin.";
		}else{
			$query = "INSERT INTO candidateRegData ( `fname`,`email`,`password`,`activatePro`,createdBy) VALUES ('$username','$email', '".md5($password)."','1','$empEmail')";
			if (mysqli_query($con, $query)) {
					echo "User added successfully";
				} else {
					echo "Error in updating record";
				}	
		}

	}		
}

function saveData(){
		$data = array();
		$email = $_SESSION['empusername'];
		$jobsPost = $_POST['tableName'];
		
		require_once ("db.php");
 
		switch ($jobsPost) {
		case "jobsPost":

  
		$jobId = $_POST['user']['jobId'];
		$jobName = $_POST['user']['jobName'];
		$jobDesc = $_POST['user']['jobDesc'];
		$minSalary = $_POST['user']['minSalary'];
		$maxSalary = $_POST['user']['maxSalary'];
		$jobExp = $_POST['user']['jobExp'];
		$qua = $_POST['user']['qua'];
		$city = $_POST['user']['city'];
		$state = $_POST['user']['state'];

		$query1 = "SELECT `jobsPostLimit`  FROM defaultValues WHERE `email`='$email'";		
		$jobsPosted = "SELECT `jobId` FROM jobsPost WHERE `email`='$email'";

		$result = mysqli_query($con, $query1);
		$resultPostedJobs = mysqli_query($con, $jobsPosted);

		$limit = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($resultPostedJobs) >= $limit['jobsPostLimit']){
			echo "You have exceded the Job Post Limit. Please contact your Admin.";
		}else{

		if(empty($jobId)){
			$query = "INSERT INTO jobsPost (`email`,`jobName`, `jobDesc`, `minSalary`,`maxSalary`,`jobExp`,`qua`,`city`,`state`) VALUES ('$email', '$jobName', '$jobDesc' , '$minSalary' , '$maxSalary', '$jobExp', '$qua', '$city', '$state')";
		}else{
			$query = "UPDATE jobsPost SET `jobName` = '$jobName', `jobDesc` = '$jobDesc',`minSalary` = '$minSalary',`maxSalary` = '$maxSalary',  `jobExp` = '$jobExp',`qua` = '$qua',`city` = '$city',`state` = '$state'  WHERE `jobId` = $jobId";
		}
		if (mysqli_query($con, $query)) {
			if(!empty($jobId))
				echo "Record updated successfully";
			else 
				echo "Record inserted successfully";
		} else {
		    echo "Error in updating record";
		}
			
		}
			
			break;
		case "candidateRegData":
			candidateRegData();
			break;
		case "employerRegData":
		$email = $_SESSION['empusername'];
		$companyname = $_POST['user']['companyname'];
		$indtype = $_POST['user']['indtype'];
		$companyorconsult = $_POST['user']['companyorconsult'];
		$contactpername = $_POST['user']['contactpername'];
		$designation = $_POST['user']['designation'];
		$mobile = $_POST['user']['mobile'];
		$pincode = $_POST['user']['pincode'];
		$officeaddress = $_POST['user']['officeaddress'];
		
$query = "UPDATE employerRegData SET `companyname` = '$companyname', `indtype` = '$indtype',`companyorconsult` = '$companyorconsult',  `contactpername` = '$contactpername',`designation` = '$designation',`mobile` = '$mobile',`pincode` = '$pincode',`officeaddress` = '$officeaddress'  WHERE `email` = '$email'";
		if (mysqli_query($con, $query)) {
				echo "Record updated successfully";
		} else {
		    echo "Error in updating record";
		}
			break;
		default:
			invalidRequest();


		}


//		echo json_encode($data);

}

function deleteData($jobId){
		require_once ("db.php");
		
		$jobsPost = $_POST['tableName'];
		switch ($jobsPost) {
		case "jobsPost":
		if(empty($jobId)) throw new Exception( "Invalid User." );
		$query = "DELETE FROM jobsPost WHERE `jobId` = $jobId";
		$query1 = "DELETE FROM jobsApplied WHERE `jobsPostId` = $jobId";


		if (mysqli_query($con, $query) && mysqli_query($con, $query1)) {
			echo "Job Id = " . $jobId . "deleted successfully";
		} else {
		    echo "Error in deleting record";
		}

			break;
		case "candidateRegData":
		$email = $_POST['user']['email'];
		$fname = $_POST['user']['fname'];
		if(empty($email)) throw new Exception( "Invalid User." );
		$query = "DELETE FROM candidateRegData WHERE `email` = '$email'";
		$query2 = "DELETE FROM defaultvalues WHERE `email` = '$email'";
		if (mysqli_query($con, $query)) {
			mysqli_query($con, $query2);
			echo "User - " . $fname . " deleted successfully";
		} else {
		    echo "Error in deleting record";
		}
			break;
		case "employerRegData":
			employerRegData();
			break;
		case "employerDeleteData":

		if(empty($jobId)) throw new Exception( "Invalid User." );
		$query = "DELETE FROM employerRegData WHERE `email` = '$jobId'";
 
		if (mysqli_query($con, $query)) {
		//delete default values
		$queryLimit = "DELETE FROM `defaultValues` WHERE `email` = '$jobId'";
		mysqli_query($con,$queryLimit);
			
			echo "Employer deleted successfully";
		} else {
		    echo "Error in deleting the record";
		}

			break;
		default:
			invalidRequest();
		}

}

function getData(){
		$email = $_SESSION['empusername'];
		$jobsPost = $_POST['tableName'];
		$userEmail = "user2@gmail.com";		
		require_once ("db.php");
		switch ($jobsPost) {
		case "jobsPost":

		$query = "SELECT * FROM `jobsPost` WHERE `email`='$email'";
		$result = mysqli_query($con, $query);		
		if (mysqli_num_rows($result) > 0) {	
		$data = array();

		while ($row = mysqli_fetch_assoc($result)) {
		$jobsPostIdTemp = $row['jobID'];
		$query1 = "SELECT * FROM `jobsApplied` WHERE `jobsPostedBy`='$email' AND `userEmail`='$userEmail' AND `jobsPostId`='$jobsPostIdTemp'";
		$result1 = mysqli_query($con, $query1);
		$candidateApplied = mysqli_num_rows($result1);
		$row["candidateApplied"] = $candidateApplied;
	    $data['data'][] = $row;
		}
		echo json_encode($data);				
		}	
		mysqli_close($con);
		
			break;

		case "defaultValues":
		$query = "SELECT * FROM `defaultValues`";
		$result = mysqli_query($con, $query);		
		if (mysqli_num_rows($result) > 0) {	
		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data['data'][] = $row;
		}
		echo json_encode($data);				
		}	
		mysqli_close($con);
		
			break;

		case "candidateRegData":
		$query = "SELECT *, NULL AS password  FROM `candidateRegData` WHERE `createdBy`='$email'";
		$result = mysqli_query($con, $query);		
		if (mysqli_num_rows($result) > 0) {	
		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data['data'][] = $row;
		}
		echo json_encode($data);				
		}	
		mysqli_close($con);
			break;
		case "employerRegData":
		$email = $_SESSION['empusername'];				
		require_once ("db.php");
		if (isset($_SESSION["adminusername"])){
			$query = "SELECT * FROM `employerRegData`";
		}
		else{
			$query = "SELECT * FROM `employerRegData` WHERE `email`='$email'";
		}
		
		$result = mysqli_query($con, $query);		

		if (mysqli_num_rows($result) > 0) {	
		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data['data'][] = $row;
		}
		echo json_encode($data);				
		}	
		mysqli_close($con);

			break;
		default:
			invalidRequest();
		}


//		echo json_encode($data);

}


function insertData(){
		$jobsPost = $_POST['tableName'];		
		require_once ("db.php");
		switch ($jobsPost) {
		case "employerRegData":
		$email = $_POST['user']['email'];
		$companyname = $_POST['user']['companyname'];
		$mobile = $_POST['user']['mobile'];
		
		
		$password = stripslashes($_POST['user']['password']);
		$password = mysqli_real_escape_string($con,$password);
        $checkEmail = "SELECT * FROM `employerRegData` WHERE email='$email'";
		$checkResult = mysqli_query($con,$checkEmail);
		$checkRow = mysqli_num_rows($checkResult);
        if($checkRow==1){
		 echo "This Email Id already registered";
         }
		else{
		$query = "INSERT INTO employerRegData (`email`,`password`, `companyname`,`mobile`) VALUES ('$email', '".md5($password)."', '$companyname','$mobile')";
			if (mysqli_query($con, $query)) {
		//insert default values
		$queryLimit = "INSERT into `defaultValues` (email,jobsPostLimit,createNewEmpLimit) VALUES ('$email', '10', '0')";
		mysqli_query($con,$queryLimit);
				
				echo "Employer added successfully";
				
			} else {
			    echo "Error in updating record";
			}			
		}		
			break;
		case "candidateRegData":
			candidateRegData();
			break;
		case "empRegDataUpdate":
		$email = $_POST['user']['email'];
		$companyname = $_POST['user']['companyname'];
		$indtype = $_POST['user']['indtype'];
		$companyorconsult = $_POST['user']['companyorconsult'];
		$contactpername = $_POST['user']['contactpername'];
		$designation = $_POST['user']['designation'];
		$mobile = $_POST['user']['mobile'];
		$pincode = $_POST['user']['pincode'];
		$officeaddress = $_POST['user']['officeaddress'];
		$createNewEmpLimit = $_POST['user']['createNewEmpLimit'];
		$jobsPostLimit = $_POST['user']['jobsPostLimit'];
	 
$query = "UPDATE employerRegData SET `companyname` = '$companyname', `indtype` = '$indtype',`companyorconsult` = '$companyorconsult',  `contactpername` = '$contactpername',`designation` = '$designation',`mobile` = '$mobile',`pincode` = '$pincode',`officeaddress` = '$officeaddress',`createNewEmpLimit` = '$createNewEmpLimit',`jobsPostLimit` = '$jobsPostLimit'  WHERE `email` = '$email'";
 
		if (mysqli_query($con, $query)) {
			//update default values
		$queryLimit = "UPDATE `defaultValues` SET `createNewEmpLimit` = '$createNewEmpLimit',`jobsPostLimit` = '$jobsPostLimit'  WHERE `email` = '$email'";
		mysqli_query($con,$queryLimit);			
				echo "Record Updated Successfully";
		} else {
		    echo "Error in updating record";
		}
			break;
		default:
			invalidRequest();
			
		}


//		echo json_encode($data);

}



?>
