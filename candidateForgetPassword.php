<?php
session_start();
require_once("db.php");
if(isset($_POST['submit']))
{
    $user_id = $_POST['user_id'];
    $result = mysqli_query($con,"SELECT * FROM candidateregdata where email='" . $_POST['user_id'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['email'];
	$email_id=$row['email'];
	$password=$row['password'];
	if($user_id==$fetch_user_id) {
                $six_digit_random_number = mt_rand(100000, 999999);
                $query = "UPDATE candidateregdata SET `temppassword` = '$six_digit_random_number'  WHERE `email` = '$email_id'";
                $result = mysqli_query($con,$query);
                    if($result){
$to = $email_id;
$subject = "VOQEOIT - Forgot Password";
$message = "
<html>
<head>
<title>VOQEO IT</title>
</head>
<body>
<p>Change Password</p>
<p>Please use the below temporary password to reset the password.</p>
<table>
<tr>
<th>Temporary password</th>
</tr>
<tr>
<td>$six_digit_random_number</td>
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
$headers .= 'Cc: webmaster@VoqeoIT.com' . "\r\n";
mail($to,$subject,$message,$headers);

                        echo "Email has been sent with temporary password. Please click below to change the password";
                        ?>
                        <br>
                        <a href="changecandidatepassword.php?user=<?php echo $email_id; ?>">Change Password</a>
                        <?php
                    }
			    }
				else{
                    echo 'Invalid Email';
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
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email:</td><td><input type='text' name='user_id'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>
