<?php 
session_start();

error_reporting(E_ERROR | E_PARSE);

require_once("db.php");
$userEmail=$_GET['user'];
if (isset($_REQUEST['employerChangePasswordSubmit'])){

    $temppassword = $_POST['temppassword'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if($password1 == $password2){
        $result1 = mysqli_query($con,"SELECT * FROM employerregdata where email='$userEmail'");
        $row1 = mysqli_fetch_assoc($result1);
        $temppasswordDB=$row1['temppassword'];
        $originalpassword = $row1['password'];
        $md5originalpassword = md5($temppassword);
        if(($md5originalpassword == $originalpassword && $temppasswordDB == 0) || ($temppasswordDB != 0 && $temppassword == $temppasswordDB) ){
            $query1 = "UPDATE employerregdata SET `temppassword` = 0  WHERE `email` = '$userEmail'";
            $result1 = mysqli_query($con,$query1);
                if($result1){
                    $query2 = "UPDATE employerregdata SET `password` = '".md5($password1)."'  WHERE `email` = '$userEmail'";
                    $result2 = mysqli_query($con,$query2);
                        if($result2){
                            echo "<h4>Password has been changed successfully";
                            echo "<br>";
                            ?>
                            <a href='index.php'>Go to home page</a>
                            <?php
                        }else{
                            echo "Error in updating the password. Please contact support";
                        }
                }else{
                    echo "Error in updating the password. Please contact support";
                }
        }else{
            echo "Temporary password did not match. Please retype";
        }
    }else{
        echo "Both the password should be same. Please retype the password";
    }
}




?>

<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:20px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Change Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Current password:</td><td><input type='text' name='temppassword' required/></td></tr>
<tr><td>New Password:</td><td><input type='text' maxlength="18"   name='password1' required/></td></tr>
<tr><td>Retype new password:</td><td><input type='password' maxlength="18"  name='password2' required/></td></tr>
<tr><td></td><td><input type='submit' name='employerChangePasswordSubmit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>
