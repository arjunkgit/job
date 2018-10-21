oooo<?php
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
