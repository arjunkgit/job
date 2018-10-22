<div style="background-color: #847b7b; width: 100%;height: 100%;padding: 0px;margin: 0px">
	 <?php
     if (isset($_REQUEST['registrationSubmit'])){

		require('db.php');

		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        $companyname = $_POST['companyname'];
        $indtype = $_POST['indtype'];
        $companyorconsult = $_POST['companyorconsult'];
        $contactpername = $_POST['contactpername'];
        $designation = $_POST['designation'];
        $officeaddress = $_POST['officeaddress'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $mobile = $_POST['mobile'];
        $alteremail = $_POST['alteremail'];
        $gst = $_POST['gst'];

        $agree = $_POST['agree'];
        $getemail = $_POST['getemail'];
     
		$trn_date = date("Y-m-d H:i:s");
        $checkEmail = "SELECT * FROM `employerRegData` WHERE email='$email'";

		$checkResult = mysqli_query($con,$checkEmail);
		$checkRow = mysqli_num_rows($checkResult);
        if($checkRow==1){
		 echo "<div style='text-align: center;background-color: white;border: 1px solid #b1b1b1;padding: 20px;' class='form'><h3>This Email Id already registered.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
         }
         else
         {

//insert default values
$queryLimit = "INSERT into `defaultValues` (email,jobsPostLimit,createNewEmpLimit) VALUES ('$email', '10', '1')";
mysqli_query($con,$queryLimit);

$query = "INSERT into `employerRegData` (email,password,companyname,indtype,companyorconsult,contactpername,designation,officeaddress,country,city,pincode,mobile,alteremail,gst,agree,getemail,trn_date) VALUES ('$email', '".md5($password)."','$companyname','$indtype','$companyorconsult','$contactpername','$designation','$officeaddress','$country','$city','$pincode','$mobile','$alteremail','$gst','$agree','$getemail','$trn_date')";
$result = mysqli_query($con,$query);
if ( false===$result ) {
printf("error: %s\n", mysqli_error($con));
}
else {
//  echo 'done2.';
}				

if($result){
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
