<?php

if(!isset($_POST['editSubmit'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();	
}
session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();	
}

$id 		 =  $_POST['id'];
$newFname    =  $_POST['newFname'];
$newLname    =	$_POST['newLname'];
$newAddress  = 	$_POST['newAddress'];
$newGender   =	$_POST['newGender'];
$newDoB      =	$_POST['newDoB'];
$newN_id     =	$_POST['newN_id'];
$newEmail    = 	$_POST['newEmail'];
$newContact  = 	$_POST['newContact'];


$errorCount = 0;
if($newFname == "" || NULL){
	$errorCount ++;
	$errorFname = "You must enter a first name";	
}
if($newLname == "" || NULL){
	$errorCount ++;
	$errorLname = "You must enter a last name";
	
}
if($newAddress == "" || NULL){
	$errorCount ++;
	$errorAddress = "You must enter an address";	
}

if($newDoB == "" || NULL){
	$errorCount ++;
	$errorDOB = "You must enter a date of birth";
	
}
if($newN_id == "" || NULL){
	$errorCount ++;
	$errorNID = "You must enter a national ID number";	
}
if($newEmail == "" || NULL){
	$errorCount ++;
	$errorEmail = "You must enter an email";
	
}
if($newContact == "" || NULL){
	$errorCount ++;
	$errorContact = "You must enter a contact number";
	
}

if($errorCount !=0){
	include ("editAdopterErrorForm.php");
	die();
	
}else{
	require('../../services/connection.php');
	
}

if($updateAdopter = mysqli_prepare($con, "UPDATE adopter SET 
								 firstName = ?,
								 lastName = ?,
								 address = ?,
								 gender = ?,
								 dateOfBirth = ?,
								 nationalIDnumber = ?,
								 email = ?,
								 contact = ?
							     WHERE adopterID = ?")){
									 
	mysqli_stmt_bind_param($updateAdopter,"sssssissi", $newFname, $newLname, $newAddress, $newGender, $newDoB, $newN_id, $newEmail, $newContact, $id);
	mysqli_stmt_execute($updateAdopter);
	mysqli_stmt_close($updateAdopter);
	
	include("updateSuccessful.php");
}else{
	echo "Error updating record" . mysqli_error($con);
}
 
 
?>