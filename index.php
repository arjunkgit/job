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
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/editor.css" rel='stylesheet' type='text/css' />
 
	<link href="editor.css" type="text/css" rel="stylesheet"/>
    <!----font-Awesome----->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!----font-Awesome----->

<style>
.jobSearch input[type=text] {
    padding: 10px !important;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #eafdff;
}

.jobSearch button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #247177;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
    margin-top: 10px;
}

.jobSearch button:hover {
    background: #144245;
}

.jobSearch::after {
    content: "";
    clear: both;
    display: table;
}
</style>

</head>
<body>
<nav class="navbar navbar-default" role="navigation" >
<div class="container">
	<?php include('loginwindow.php'); ?>
	<?php include('loginmenu.php'); ?>
</div>
<div class="container">
	<?php include('topMenu.php'); ?>
</div>
</nav>
<div class="container">
<form class="jobSearch" action="searchPage.php">
  <input type="text" placeholder="Search.. EX: Software Engineer, Wipro, BE" name="search">
  <button type="submit">Find Jobs</button>
</form>
</div>
<?php include('slider.php'); ?>
<?php include('currentOpen.php'); ?>
<?php include('ourClient.php'); ?>
<?php include('footer.php'); ?>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
function setResult(resultType, resultData){
    var resultType = resultType;
    var resultData = resultData;
    if(resultType == "success"){
    	$("#ResultData").css("display", "block");
        $("#ResultData").addClass("alert alert-success alert-dismissable fade in");
        $("#ResultMessage").text(resultData); 
        $("#ResultData span:first-child").addClass("glyphicon glyphicon-ok");   
        $("#ResultData").fadeTo(2000, 1).slideUp(500, function(){
			$("#ResultData").css("display", "none"); 
            $("#ResultMessage").text("");     
	});
    }else if(resultType == "error"){
    	$("#ResultData").css("display", "block");
        $("#ResultData").addClass("alert alert-success alert-dismissable fade in");
        $("#ResultMessage").text(resultData); 
        $("#ResultData span:first-child").addClass("glyphicon glyphicon-hand-right");   
        $("#ResultData").fadeTo(2000, 1).slideUp(500, function(){	
        	$("#ResultData").css("display", "none"); 
            $("#ResultMessage").text(""); 
        });        
    }else { }
    return;
}
</script>


</body>
</html>
