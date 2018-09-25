<?php 
session_start();
if (isset($_SESSION["username"])){
	handleUserData();
}else{
    
}

function handleUserData(){
    $type = $_POST['type'];

	switch ($type) {
	case "updateUserRecord":
        updateUserRecord();
		break;
	case "deleteUserData":
		deleteData();
		break;
	case "getUserData":
		getUserData();
        break;
    //emphistory
    case "addOrUpdateEmpHistory":
    addOrUpdateEmpHistory();
    break;
    //projectHistory
    case "addOrUpdateProjectHistory";
    addOrUpdateProjectHistory();
    break;
    case "deleteEmpHistory":
    deleteEmpHistory();
    break;

	default:
		invalidRequest();
	}
}


function getUserData(){
    $email = $_SESSION['username'];
    $tableName = $_POST['tableName'];
    require_once ("db.php");
        $query = "SELECT * FROM `$tableName` WHERE `email`='$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {	
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data['data'][] = $row;
        }
        echo json_encode($data);				
        }	
        mysqli_close($con);
//end getuserData
}

function invalidRequest(){
    echo "invalid Request";
}


//updateUserRecord 
function updateUserRecord(){
    $data = array();
    $email = $_SESSION['username'];
    $tableName = $_POST['tableName'];
    
    require_once ("db.php");

    switch ($tableName) {
    case "candidateregdata":
    $email = $_SESSION['username'];
    $CurrentComapany = $_POST['user']['CurrentComapany'];
    $CurrentDesignation = $_POST['user']['CurrentDesignation'];
    $ResumeHeading = $_POST['user']['ResumeHeading'];
    $TotalExp = $_POST['user']['TotalExp'];
    $activatePro = $_POST['user']['activatePro'];
    $address1 = $_POST['user']['address1'];
    $address2 = $_POST['user']['address2'];
    $address3 = $_POST['user']['address3'];
    $client = $_POST['user']['client'];
    $country = $_POST['user']['country'];
    $deactivatePro = $_POST['user']['deactivatePro'];
    $deletePro = $_POST['user']['deletePro'];
    $duration = $_POST['user']['duration'];
    $empDetails = $_POST['user']['empDetails'];
    $day = $_POST['user']['day'];
    $dob = $_POST['user']['dob'];
    $fname = $_POST['user']['fname'];
    $gender = $_POST['user']['gender'];
    $linked = $_POST['user']['linked'];
    $lname = $_POST['user']['lname'];
    $mobile = $_POST['user']['mobile'];
    $phone = $_POST['user']['phone'];
    $pincode = $_POST['user']['pincode'];
    $proDetails = $_POST['user']['proDetails'];
    $proTitle = $_POST['user']['proTitle'];
    $profilePhoto = $_POST['user']['profilePhoto'];
    $resumeUploadName = $_POST['user']['resumeUploadName'];
    $resumeUploadURL = $_POST['user']['resumeUploadURL'];
    $summary = $_POST['user']['summary'];
    $title = $_POST['user']['title'];
    $town = $_POST['user']['town'];
    $year = $_POST['user']['year'];
    
    $query = "UPDATE candidateregdata SET `CurrentComapany` = '$CurrentComapany',`CurrentDesignation` = '$CurrentDesignation',`ResumeHeading` = '$ResumeHeading',`TotalExp` = '$TotalExp',`activatePro` = '$activatePro',`address1` = '$address1',`address2` = '$address2',`address3` = '$address3',`client` = '$client',`country` = '$country',`deactivatePro` = '$deactivatePro',`deletePro` = '$deletePro',`duration` = '$duration',`empDetails` = '$empDetails',`dob` = '$dob',`fname` = '$fname',`gender` = '$gender',`linked` = '$linked',`lname` = '$lname',`mobile` = '$mobile',`phone` = '$phone',`pincode` = '$pincode',`proDetails` = '$proDetails',`proTitle` = '$proTitle',`profilePhoto` = '$profilePhoto',`resumeUploadName` = '$resumeUploadName',`summary` = '$summary',`title` = '$title',`town` = '$town',`year` = '$year' WHERE `email` = '$email'";
    if (mysqli_query($con, $query)) {
            echo "success";
    } else {
            echo "error";
    }
    break;
 
    default:
    invalidRequest();


    }


//		echo json_encode($data);

}


//emp history
function addOrUpdateEmpHistory(){
    $data = array();
    $email = $_SESSION['username'];
    $tableName = $_POST['tableName'];
    
    require_once ("db.php");

    $empDetailsId = $_POST['user']['id'];
    $empHistory = $_POST['user']['empHistory'];
    $workedCompany = $_POST['user']['workedCompany'];
    $workedYear = $_POST['user']['workedYear'];
    $workedMonth = $_POST['user']['workedMonth'];
    $workedJoinDate = $_POST['user']['workedJoinDate'];
    $workedEndDate = $_POST['user']['workedEndDate'];
    $workedCurrentJob = $_POST['user']['workedCurrentJob'];
    
    if(empty($empDetailsId)){
        $query = "INSERT INTO $tableName (`id`,`email`, `empHistory`, `workedCompany`, `workedYear`,`workedMonth`,`workedJoinDate`,`workedEndDate`, `workedCurrentJob`) VALUES ('$empDetailsId', '$email', '$empHistory', '$workedCompany' , '$workedYear' , '$workedMonth', '$workedJoinDate', '$workedEndDate', '$workedCurrentJob')";
    }else{
        $query = "UPDATE $tableName SET `empHistory` = '$empHistory', `workedCompany` = '$workedCompany',`workedYear` = '$workedYear',`workedMonth` = '$workedMonth',  `workedJoinDate` = '$workedJoinDate',`workedEndDate` = '$workedEndDate',`workedCurrentJob` = '$workedCurrentJob'  WHERE `id` = $empDetailsId";
    }
    if (mysqli_query($con, $query)) {
        if(!empty($empDetailsId))
        //updated
            echo "success";
        else 
        //inserted
            echo "success";
    } else {
        echo "Error in updating record";
    }

}

//project history
 
function addOrUpdateProjectHistory(){
    $data = array();
    $email = $_SESSION['username'];
    $tableName = $_POST['tableName'];
    
    require_once ("db.php");

    $projectDetailsId = $_POST['user']['id'];
    $projectTitle = $_POST['user']['projectTitle'];
    $client = $_POST['user']['client'];
    $duration = $_POST['user']['duration'];
    $projectDetails = $_POST['user']['projectDetails'];
    if(empty($projectDetailsId)){
        $query = "INSERT INTO $tableName (`id`,`email`,`projectTitle`,`client`, `duration`, `projectDetails`) VALUES ('$projectDetailsId', '$email','$projectTitle', '$client', '$duration', '$projectDetails')";
    }else{
        $query = "UPDATE $tableName SET `projectTitle` = '$projectTitle', `client` = '$client',`duration` = '$duration',`projectDetails` = '$projectDetails'  WHERE `id` = $projectDetailsId";
    }
    echo $query;
    if (mysqli_query($con, $query)) {
        if(!empty($projectDetailsId))
        //updated
            echo "success";
        else 
        //inserted
            echo "success";
    } else {
        echo "Error in updating record";
    }

}

function deleteEmpHistory(){
    require_once ("db.php");
    $empDetailsId = $_POST['user']['id'];
    echo $empDetailsId;
    $tableName = $_POST['tableName'];
    if(empty($empDetailsId)) throw new Exception( "invalid" );
    $query = "DELETE FROM $tableName WHERE `id` = $empDetailsId";		
    if (mysqli_query($con, $query)) {
        echo "deleted";
    } else {
        echo "error";
    }

}

?>
