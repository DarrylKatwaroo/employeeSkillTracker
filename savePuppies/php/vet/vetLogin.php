<?php

if(!isset($_POST['loginSubmit'])){
	Header("Location:../../html/vetLoginForm.html");
	die();

}

$un = $_POST['uname'];
$pw = $_POST['pwd'];

if($un == "" || NULL){
	$feedback = "You must enter a username";
	Header("Location:http://localhost/savePuppies/php/vet/vetLoginForm.php?feedback=$feedback");
	
}else if($pw == "" || NULL){
	$feedback = "You must enter a password";
	Header("Location:http://localhost/savePuppies/php/vet/vetLoginForm.php?feedback=$feedback");
	
}else{

	require('../../services/connection.php');

	$personToFind = "SELECT *
					 FROM vet, staff
					 WHERE staff.staffID = vet.staffID
					 AND staff.username = '$un'
					 AND staff.password = '$pw'";
					 
	 $queryResult = mysqli_query($con,$personToFind);
	 
	 if(mysqli_num_rows($queryResult) == 1){
		session_start();
		$row = mysqli_fetch_array($queryResult);
		
		$_SESSION['staffID'] = $row['staffID'];
		$_SESSION['name'] = $row['name'];
		Header("Location:vetWelcome.php");
		}
		
		else{
			$feedback = "User not found.";
			Header("Location:http://localhost/savePuppies/php/vet/vetLoginForm.php?feedback=$feedback");
		}
}
?>