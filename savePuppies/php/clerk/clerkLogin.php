<?php


if(!isset($_POST['loginSubmit'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}


$un = $_POST['uname'];
$pw = $_POST['pwd'];




if($un == "" || NULL){
	$feedback = "You must enter a username";
	Header("Location:http://localhost/savePuppies/php/clerk/clerkLoginForm.php?feedback=$feedback");
	die();
		
}else if($pw == "" || NULL){
	$feedback = "You must enter a password";
	Header("Location:http://localhost/savePuppies/php/clerk/clerkLoginForm.php?feedback=$feedback");
	die();
	
}else{
	require('../../services/connection.php');
}


$personToFind = "SELECT *
				 FROM staff,clerk
				 WHERE staff.staffID = clerk.staffID
				 AND staff.username = '$un'
				 AND staff.password = '$pw'";
				 
$queryResult = mysqli_query($con,$personToFind);

if(mysqli_num_rows($queryResult) ==1){

	session_start();
	$row = mysqli_fetch_array($queryResult);
	
	$_SESSION['staffID'] = $row['staffID'];
	Header("Location:http://localhost/savePuppies/php/clerk/clerkWelcome.php");
	
}else{
	$feedback = "User not found.";
	Header("Location:http://localhost/savePuppies/php/clerk/clerkLoginForm.php?feedback=$feedback");
	die();
}

?>