<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Dashboard | Job Portal</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="jobs" />
    <script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>

	<?php include('headFiles.html'); ?>
    

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
<div class="container">
	<?php include('loginwindow.php'); ?>
	<?php include('loginmenu.php'); ?>
</div>
<div class="container">
	<?php include('topMenu.php'); ?>
</div>
</nav>
<br/>
<?php
if (isset($_SESSION["username"]))
{
	include('candidate/view/candidateDashboardMain.php');
//	include('candidateDashboard.php');
}
else
if (isset($_SESSION["empusername"])){
	include('employerDashboard.php');
}
else{

}
?>        
<?php include('footer.php'); ?>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
