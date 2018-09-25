<?php
require('db.php');
session_start();
if (isset($_SESSION["username"]))
{
	$target_dir = "uploadResume/";
	$email = $_SESSION["username"];
	$emailOriginal = $_SESSION["username"];
	$userName = strstr($email, '@', true); // As of PHP 5.3.0	
	$target_file = $target_dir . $userName .  basename($_FILES["resumeFileToUpload"]["name"]);
	$target_file_name = $userName .  basename($_FILES["resumeFileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["resumeUpload"])) {
		$allowed =  array('txt','xls' ,'docx','doc');
		$filename = $_FILES['resumeFileToUpload']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(in_array($ext,$allowed)) {
//	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
			if (move_uploaded_file($_FILES["resumeFileToUpload"]["tmp_name"], $target_file)) {
				$query = "UPDATE `candidateRegData` SET `resumeUploadURL`='$target_file',`resumeUploadName`='$target_file_name' WHERE email='$emailOriginal'";
				$result = mysqli_query($con,$query);
			        if($result){
			        	//". basename( $_FILES["fileToUpload"]["name"]). "
				        header("Location: dashboard.php#/uploadResume");			       	
			        }    					
			    } 
			    else {
			     	echo "Sorry, there was an error uploading your file.";
		    	}
		}else{
	        echo "Please upload document format.";
	        $uploadOk = 0;
		}
	}
}
else{
	echo "Error in uploading";
}

?>
