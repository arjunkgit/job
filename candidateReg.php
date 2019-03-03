<div style="background-color: #847b7b; width: 100%;height: 100%;padding: 0px;margin: 0px">
	 <?php
     if (isset($_REQUEST['registrationSubmit'])){

		require('db.php');

		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
    $password2 = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
 
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $town = $_POST['town'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $linked = $_POST['linked'];
        
        $trn_date = date("Y-m-d H:i:s");
        if($email == ''){
            echo "Please provide a valid email ID and try again";
            exit;
        }
        $checkEmail = "SELECT * FROM `candidateregdata` WHERE email='$email'";
		$checkResult = mysqli_query($con,$checkEmail);
		$checkRow = mysqli_num_rows($checkResult);
        if($checkRow==1){
		 echo "<div style='text-align: center;background-color: white;border: 1px solid #b1b1b1;padding: 20px;' class='form'><h3>This Email Id already registered.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
         }
         else
         {
        $query = "INSERT into `candidateregdata` (email,password,title,fname,lname,dob,address1,address2,address3,town,country,phone,mobile,linked,activatePro,deactivatePro,deletePro,createdBy) VALUES ('$email', '".md5($password)."','$title','$fname','$lname','$dob','$address1','$address2','$address3','$town','$country','$phone','$mobile','$linked',1,0,0,'$email')";
        $result = mysqli_query($con,$query);
            if($result){
              //send mail
$to = $email;
$subject = "VOQEOIT - Candidate Registration";
$message = "
<html>
<head>
<title>VOQEO IT</title>
</head>
<body>
<p>Hi $fname,</p>
<h4>Welcome to VOQEOIT</h4>
<p>You have registered successfully</p>
<table>
<tr>
<th>Email ID</th>

</tr>
<tr>
<td>$email</td>

</tr>
</table>
</br>
<p>Regards,</p>
<p>
VoqeoIT Team
</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Hiring@VoqeoIT.com>' . "\r\n";
$headers .= 'Bcc: arjunkneworld@gmail.com,manjulap@voqeoit.com' . "\r\n";

mail($to,$subject,$message,$headers);
                echo "<div style='text-align: center;background-color: white;margin: 10px;padding: 20px;' class='form1'><h3 style='color: green;'>You are registered successfully.</h3><br/>Click here to login <a href='index.php'>Home Page</a></div>";
	        }
        }
    }
    else
    {
        echo "<div style='text-align: center;background-color: white;border: 1px solid #b1b1b1;padding: 20px;' class='form1'><h3>Username or password is wrong.</h3><br/>Login again <a href='index.php'>Home Page</a></div>";
    }
?>

	
</div>
