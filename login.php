<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body style="background-color: #847b7b; width: 100%;height: 100%;padding: 0px;margin: 0px">
<div class="container">
<div class="row" style="text-align: center;background-color: white;border: 1px solid #b1b1b1;padding: 20px;">
<div class="col-md-12 text-center">
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['candidateLoginSubmit'])){
		$email = $_POST['email'];
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `candidateRegData` WHERE email='$email' and password='".md5($password)."' ";
		$result = mysqli_query($con,$query);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $email;
			header("Location: dashboard.php"); // Redirect user to index.php
            }else{
	echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a> again</div>";
				}
    }else{
?>
<div class="form1">
<h2>Log In</h2>
<p>Not registered yet? <br> <a href='registration.php'>Register Here</a></p>
</div>
<?php 
} 
?>
</div>
</div>
</div>

</body>
</html>
