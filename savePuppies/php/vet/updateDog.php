<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
	die();
}

$id 		= $_POST['id'];
$newName    = $_POST['newName'];
$newBreed   = $_POST['newBreed'];
$newGender  = $_POST['newGender'];
$newDC      = $_POST['newDC'];
$newHeight  = $_POST['newHeight'];
$newWeight  = $_POST['newWeight'];
$newGenDesc = $_POST['newGenDesc'];
$newDF      = $_POST['newDF'];
$newStatus  = $_POST['newStatus']."<br>";

$errorCount = 0;
if($newName == "" || NULL){
	$errorCount ++;
	$errorName = "You must enter a name";	
}

if($newHeight == "" || NULL){
	$errorCount ++;
	$errorHeight = "You must enter a height";	
}
if($newWeight == "" || NULL){
	$errorCount ++;
	$errorWeight = "You must enter a weight";
	
}

if($newGenDesc == "" || NULL){
	$errorCount ++;
	$errorDesc = "You must enter a description";
	
}

if($newDF == "" || NULL){
	$errorCount ++;
	$errorDF = "You must enter a date";
	
}

if($errorCount !=0){
	include ("editDogErrorForm.php");
	die();
	
}else{
	require("../../services/connection.php");
	include("dogImgUpload.php");
	
}

if($updateDog = mysqli_prepare($con, "UPDATE dog SET 
								 name =?,
								 breed =?,
								 gender =?,
								 dominantColour =?,
								 height =?,
								 weight =?,
								 generalDescription =?,
								 dateFound =?,
								 dogImage =?,
								 status =?
							     WHERE dogID =?")){
	mysqli_stmt_bind_param($updateDog,"ssssddsssii", $newName, $newBreed, $newGender, $newDC, $newHeight, $newWeight, $newGenDesc, $newDF, $imgFileName, $newStatus, $id);
	mysqli_stmt_execute($updateDog);
	mysqli_stmt_close($updateDog);
	
	include("updateSuccessful.php");
	mysqli_error($con);
}else{
	echo "Error updating record" . mysqli_error($con);
}
 
 
?>