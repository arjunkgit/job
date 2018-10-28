<?php 
session_start();
if (isset($_SESSION["username"])){
	handleUserData();
}else if (isset($_SESSION["adminusername"])){
	handleAdminData();
} else if (isset($_SESSION["empusername"])){
	if( isset($_POST['type']) && !empty($_POST['type'] )){
		handleEmpData();
	}
	else{
		invalidRequest(); 
	}
}
else{
	echo "Please login !";	
}

function handleUserData(){
	if (isset($_SESSION["username"])){
		echo "User Logged in, Cant handle the request";
	}
}


function handleEmpData(){
