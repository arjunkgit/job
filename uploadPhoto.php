<?php
require('db.php');
session_start();
if (isset($_SESSION["username"]))
{
	$target_dir = "profilePhotos/";
	$email = $_SESSION["username"];
	$emailOriginal = $_SESSION["username"];
	$userName = strstr($email, '@', true); // As of PHP 5.3.0	
	$target_file = $target_dir . $userName .  basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["photoUpload"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
//	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$query = "UPDATE `candidateregdata` SET `profilePhoto`='$target_file' WHERE email='$emailOriginal'";
				$result = mysqli_query($con,$query);
			        if($result){
			        	//". basename( $_FILES["fileToUpload"]["name"]). "
				        header("Location: dashboard.php");			       	
			        }    					
			    } 
			    else {
			     	echo "Sorry, there was an error uploading your file.";
		    	}
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
}
else{
	echo "Error in uploading";
}

?>
