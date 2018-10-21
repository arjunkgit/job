<?php
	session_start();
	if (!isset($_SESSION["adminusername"]))
	{
		header("Location: adminLogin.php");
	}

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
.padding-top-bottom-5px
{
	padding-top: 5px !important;
	padding-bottom: 5px !important;
}

md-content.md-default-theme, md-content{
