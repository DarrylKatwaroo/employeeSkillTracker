<?php

if(!isset($_POST['adoptionFormSubmit'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}

$adopterID = $_POST['adopterID'];
$dogID 	   = $_POST['dogID'];

//set clerk id here
$clerkID = $_SESSION['staffID'];

//set date here
$today = date("Y-m-d");

require ('../../services/connection.php');

$aQuery = "SELECT *
		  FROM adopter
		  WHERE adopter.adopterID = '$adopterID'";
		  
$dQuery = "SELECT *
		  FROM dog
		  WHERE dog.dogID = '$dogID'";
		  
$aQueryResult = mysqli_query($con,$aQuery);
$dQueryResult = mysqli_query($con,$dQuery);

$query = mysqli_prepare($con, "INSERT INTO adoption(staffID, adopterID, dogID, adoptionDate)
							  VALUES(?,?,?,?)");

mysqli_stmt_bind_param($query, "iiis", $clerkID, $adopterID, $dogID, $today);

if(mysqli_stmt_execute($query)){

	//close statement
	mysqli_stmt_close($query);

$query43 = "SELECT ID FROM status WHERE name = 'Adopted'";

$result43 = mysqli_query($con, $query43);

while($row = mysqli_fetch_assoc($result43)){
	$v43 = $row['ID'];
}

$changeDogStatus = "UPDATE dog SET dog.status = '$v43'
					WHERE dogID = '$dogID'";
					
mysqli_query($con, $changeDogStatus);
					
Header("Location:adoptionSuccessful.php");
	
}else{
	echo "Problem occurred";
	echo mysqli_error($con);
}

?>
