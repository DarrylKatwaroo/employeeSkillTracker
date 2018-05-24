<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}

if(!isset($_POST['regSubmit'])){
	Header("Location:../../html/regAdopterForm.php");
	die();
}

$clerkID = $_SESSION['staffID'];

$fname	 = $_POST['fname'];
$lname	 = $_POST['lname'];
$address = $_POST['address'];
$gender	 = $_POST['gender'];
$doB	 = $_POST['doB'];
$n_id	 = $_POST['n_id'];
$email	 = $_POST['email'];
$contact = $_POST['contact'];

$errorCount = 0;
if($fname == "" || NULL){
	$errorCount ++;
	$errorFname = "You must enter a first name";	
}
if($lname == "" || NULL){
	$errorCount ++;
	$errorLname = "You must enter a last name";
	
}
if($address == "" || NULL){
	$errorCount ++;
	$errorAddress = "You must enter an address";	
}

if($doB == "" || NULL){
	$errorCount ++;
	$errorDOB = "You must enter a date of birth";
	
}
if($n_id == "" || NULL){
	$errorCount ++;
	$errorNID = "You must enter a national ID number";	
}
if($email == "" || NULL){
	$errorCount ++;
	$errorEmail = "You must enter an email";
	
}
if($contact == "" || NULL){
	$errorCount ++;
	$errorContact = "You must enter a contact number";
	
}

if($errorCount !=0){
	include ("regAdopterErrorForm.php");
	die();
	
}else{
	require('../../services/connection.php');
	
}

if($insertAdopter = mysqli_prepare($con, "INSERT INTO adopter(firstName,
										  lastName,
										  address,
										  gender,
										  dateOfBirth,
										  nationalIDnumber,
										  email,
										  contact,
										  clerkID) 
										  VALUES(?,?,?,?,?,?,?,?,?)")){
	
	//bind parameters
	mysqli_stmt_bind_param($insertAdopter,"sssssissi",$fname, $lname, $address, $gender, $doB, $n_id, $email, $contact, $clerkID);
}

	//execute statement
if(mysqli_stmt_execute($insertAdopter)){

	//close statement
	mysqli_stmt_close($insertAdopter);
	
	Header("Location:successfulRegistration.php");
	
}else{
	echo "Problem occurred";
	echo mysqli_error($con);
}
?>