<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin | Job Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="admin" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.css" />
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
<style>
	.noCap{
	text-transform: none;
} 
md-card md-card-title md-card-title-media .md-media-xs {
 height:40px;
 width:40px
}
</style>
</head>
<body ng-app="adminModule">


<div ng-controller="loginCtrl" layout="column" ng-cloak style="height:100%;">

  <section layout="row" flex>
    <md-content flex>
	    <md-toolbar class="md-hue-2">
	      <div class="md-toolbar-tools">
			<h2 flex md-truncate>Admin Login</h2>
	      </div>
	    </md-toolbar>
		<div layout="column" layout-padding>
<?php
	require('../db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['adminLoginSubmit'])){
		$email = $_POST['email'];
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `adminregdata` WHERE email='$email' and password='".md5($password)."' "; 

	
      $result = mysqli_query($con,$query);
		if ( false===$result ) {
		printf("error: %s\n", mysqli_error($con));
		}
		else {
		// echo 'done2.';
		}				
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['adminusername'] = $email;
			header("Location: index.php"); // Redirect user to index.php
            }else{
	echo "<div class='form' style='text-align: center;'><h3>Username/password is incorrect.</h3></div>";
				}
    }else{

}?>

<?php
if (!isset($_SESSION["adminusername"]))
						{
?>



<div layout="column" layout-align="center center">

  <div flex="100">

          <form action="adminLogin.php" method="post" name="login" style="padding: 10px;border: 1px solid #e7e7e7;background-color: white;">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email ID</label>
              <input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw"  name="password" placeholder="Enter password" required>
            </div>
              <button type="submit" class="btn btn-success btn-block" name="adminLoginSubmit">
              <span class="glyphicon glyphicon-off"></span> Login</button>
          </form> 
  </div>
</div>




<?php
						}
						else
						{
?>

<div> 
	Logged in Admin
</div>


<?php							
							
						}
?>


		</div>
      <div flex></div>
    </md-content>
  </section>
</div>
  
  
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs//1.6.4/angular-animate.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-aria.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-messages.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.js"></script> 
<script>
var app2 = angular.module('adminModule', ['ngMaterial']);	
	app2.controller('loginCtrl', function($scope){
		$scope.Name = "name1";
	});
</script>

</body>
</html> 
