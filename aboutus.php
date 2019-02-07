<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Home | Job Portal</title>

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

<div class="container">
<div class="row">
	<div class="col-md-3">
		<?php include('ourServicesLeft.php'); ?>			
	</div>
	<div class="col-md-6 vqBox" >
		<br>
		<h2 class="vqH2">About Us</h2>
		<p>The ng generate and ng add commands take as an argument the artifact or library to be generated or added to the current project. In addition to any general options, each artifact or library defines its own options in a schematic. Schematic options are supplied to the command in the same format as immediate command options.</p>
		<br>
		<p>You can edit the generated files directly, or add to and modify them using CLI commands. Use the ng generate command to add new files for additional components and services, and code for new pipes, directives, and so on. Commands such as add and generate, which create or operate on apps and libraries, must be executed from within a workspace or project folder.</p>
		<br>		
		<p>The ng generate and ng add commands take as an argument the artifact or library to be generated or added to the current project. In addition to any general options, each artifact or library defines its own options in a schematic. Schematic options are supplied to the command in the same format as immediate command options.</p>
		<br>
	</div>
	<div class="col-md-3">
		<?php include('currentOpenSlideUp.php'); ?>			
	</div>
</div>	
</div>

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
