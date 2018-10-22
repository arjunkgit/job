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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900'
        rel='stylesheet' type='text/css'>
    <!----font-Awesome----->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!----font-Awesome----->
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
	<div class="col-md-6">
		<br>
		<h2>About Us : </h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras iaculis molestie erat, sed vehicula mauris blandit sed. Vivamus quis ex et dolor hendrerit elementum. Vivamus nec imperdiet nisi, sit amet pretium sem. Mauris porta metus sem, vitae dignissim tortor placerat et. In leo felis, finibus nec arcu in, aliquet sodales arcu. Integer eget neque vel odio commodo aliquam. Aenean sit amet nulla et mauris scelerisque efficitur sed nec ligula. Curabitur et auctor ipsum. Pellentesque eleifend purus nec dignissim venenatis. Vestibulum quis elit id orci imperdiet lobortis. Aliquam at arcu dignissim, accumsan tortor vel, tempor felis. </p>
		<br>
		<p>Phasellus porta congue erat, a egestas ex ultricies tempor. Sed luctus mauris et arcu pharetra, vitae vehicula urna dictum. Proin eleifend interdum urna id dignissim. Sed ut ante eget lacus ullamcorper faucibus ac non elit. Aenean iaculis blandit urna at malesuada. In tristique mi a facilisis efficitur. Nulla iaculis, metus sed facilisis elementum, est dui dignissim odio, eu consectetur purus lorem vitae sapien. Cras tincidunt quis magna et tincidunt. Vestibulum vestibulum elit at aliquam ultrices. Donec lectus sem, ornare in condimentum sed, pharetra sed velit. In convallis massa at est venenatis tempus. Integer sed molestie ex. Cras maximus, erat id vehicula convallis, tortor odio placerat sem, ut lobortis arcu odio quis dolor. </p>
		<br>		
		<p>Curabitur ut enim eu felis sodales facilisis ac vitae massa. Aenean posuere, massa ac porta varius, dui velit placerat metus, vel pellentesque libero nisl in ante. Maecenas eget consectetur nulla. Nullam nec porttitor lorem. Aliquam vitae gravida eros, eu placerat erat. Quisque mattis diam sed tristique feugiat. Nam convallis euismod ipsum, vitae varius nisi lobortis nec. Mauris eu mi sem. Cras hendrerit pharetra nunc ut vulputate. Duis sed rutrum magna, eu euismod nulla. Nulla molestie molestie turpis, et convallis eros dapibus at. </p>
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
