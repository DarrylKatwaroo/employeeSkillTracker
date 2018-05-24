<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
	die();
}


if(!isset($_POST['regSubmit'])){
	Header("Location:../../index.html");
	die();
	

}


$vetID = $_SESSION['staffID'];

$name	 		= $_POST['name'];
$breed   		= $_POST['breed'];
$gender	 		= $_POST['gender'];
$dominantColour = $_POST['domCol'];
$height	        = $_POST['height'];
$weight	 		= $_POST['weight'];
$genDesc 		= $_POST['genDesc'];
$dateFound 		= $_POST['dateFound'];
$status	 		= $_POST['Status'];


$errorCount = 0;
if($name == "" || NULL){
	$errorCount ++;
	$errorName = "You must enter a name";	
}

if($breed == "noselect"){
	$errorCount ++;
	$errorBreed = "You must select a breed";	
}

if($dominantColour == "noselect"){
	$errorCount ++;
	$errorDC = "You must select a colour";
}
if($height == "" || NULL){
	$errorCount ++;
	$errorHeight = "You must enter a height";	
}
if($weight == "" || NULL){
	$errorCount ++;
	$errorWeight = "You must enter a weight";
	
}

if($genDesc == "" || NULL){
	$errorCount ++;
	$errorDesc = "You must enter a description";
	
}

if($dateFound == "" || NULL){
	$errorCount ++;
	$errorDF = "You must enter a date";
	
}

if($status == "noselect"){
	$errorCount ++;
	$errorStatus = "You must select a status";
	
}


if($errorCount !=0){
	include ("regDogErrorForm.php");
	die();
	
}else{
	require("../../services/connection.php");
	include("dogImgUpload.php");
	
}

$getStatusID = "SELECT ID 
				FROM status
				WHERE status.name = '$status'";
				
$statusResult = mysqli_query($con, $getStatusID);

while ($row = mysqli_fetch_assoc($statusResult)) {
	$statusID = $row['ID'];
    echo $row['ID']."<br>";
}

if($insertDog = mysqli_prepare($con, "INSERT INTO dog(name,
										  breed,
										  gender,
										  dominantColour,
										  height,
										  weight,
										  generalDescription,
										  dateFound,
										  dogImage,
										  status,
										  vetID)
										  VALUES(?,?,?,?,?,?,?,?,?,?,?)")){
											  
	
	//bind parameters
	mysqli_stmt_bind_param($insertDog,"ssssddsssii",$name, $breed, $gender, $dominantColour, $height, $weight, $genDesc, $dateFound, $imgFileName, $statusID, $vetID);
}

	//execute statement
if(mysqli_stmt_execute($insertDog)){

	//close statement
	mysqli_stmt_close($insertDog);
	
	Header("Location:successfulDogRegistration.php");
	
}else{
	echo "Problem occurred";
	echo mysqli_error($con);
}


?>