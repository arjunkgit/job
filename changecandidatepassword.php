<?php 
session_start();
require_once("db.php");
$userEmail=$_GET['user'];
if (isset($_REQUEST['candidateChangePasswordSubmit'])){

    $temppassword = $_POST['temppassword'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if($password1 == $password2){
        $result1 = mysqli_query($con,"SELECT * FROM candidateregdata where email='$userEmail'");
        $row1 = mysqli_fetch_assoc($result1);
        $temppasswordDB=$row1['temppassword'];
        $originalpassword = $row1['password'];
        $md5originalpassword = md5($originalpassword);
        if(($md5originalpassword == $originalpassword && $temppasswordDB == 0) || ($temppasswordDB != 0 && $temppassword == $temppasswordDB)){
            $query1 = "UPDATE candidateregdata SET `temppassword` = 0  WHERE `email` = '$userEmail'";
            $result1 = mysqli_query($con,$query1);
                if($result1){
                    $query2 = "UPDATE candidateregdata SET `password` = '".md5($password1)."'  WHERE `email` = '$userEmail'";
                    $result2 = mysqli_query($con,$query2);
                        if($result2){
$to = $userEmail;
$subject = "VOQEOIT - Change Password";
$message = "
<html>
<head>
<title>VOQEO IT</title>
</head>
<body>
<p>Change Password</p>
<p>Your password has been changed successfully</p>
<table>
<tr>
<th>Email ID</th>
<th>New Password</th>
</tr>
<tr>
<td>$userEmail</td>
<td>$password1</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@VoqeoIT.com>' . "\r\n";
$headers .= 'Bcc: arjunkneworld@gmail.com' . "\r\n";
mail($to,$subject,$message,$headers);
                            echo "<h4>Password has been changed successfully";
                            echo "<br>";
                            echo $to,$subject,$message;
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
<tr><td>New Password:</td><td><input type='password' maxlength="18"   name='password1' required/></td></tr>
<tr><td>Retype new password:</td><td><input type='password' maxlength="18"  name='password2' required/></td></tr>
<tr><td></td><td><input type='submit' name='candidateChangePasswordSubmit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>
