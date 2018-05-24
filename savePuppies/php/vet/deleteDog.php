<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
	die();
}

$id = $_GET['id'];

require('../../services/connection.php');

$del = "DELETE 
		FROM dog
		WHERE dog.dogID = '$id'";

		
if(mysqli_query($con,$del)){
	include("deleteSuccessful.php");
}else{
	echo mysqli_error($con);
}

?>