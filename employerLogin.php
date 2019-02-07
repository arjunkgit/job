<?php
 session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Employer Login | Job Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="jobs" />
    <script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    
	<?php include('headFiles.html'); ?>
	<style>
		input[type="text"], input[type="email"], input[type="password"] {
		    padding: 10px !important;
		}
		.form-horizontal .control-label{
			font-weight: 400;
		}
	</style>

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
<div class="container">
</div>
<div class="container">
	<?php include('topMenu.php'); ?>
</div>
</nav>
<br>
<div class="container" style="padding-bottom: 10px;">
	  <h2>Employer Login</h2>
</div>

<div class="container" style="padding-bottom: 10px;">
	<div class="row">
		<div class="col-md-4">
		&nbsp;
		</div>	
		<div class="col-md-4 vqBox" style="padding: 15px;margin-bottom: 130px;">
          <form action="emplogin.php" method="post" name="login" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email ID</label>
              <input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw"  name="password" placeholder="Enter password" required>
            </div>
            <div class="checkbox">
          <p>Forgot <a href="#">Password?</a></p>
            </div>
              <button type="submit" class="btn btn-success btn-block" name="empLoginSubmit">
              <span class="glyphicon glyphicon-off"></span> Login</button>
          </form> 
		</div>
		<div class="col-md-4">
		&nbsp;
		</div>		
	</div>
</div>

<?php include('footer.php'); ?>

<script>
//for login 
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
