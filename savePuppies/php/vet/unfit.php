<?php

if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
	die();
}


require('../../services/connection.php');

$N = "SELECT *
	  FROM dog, status
	  WHERE dog.status = status.ID
	  AND status.name = 'Not Ready for Adoption'";	
	  
$ResultN = mysqli_query($con,$N);

$unfit = mysqli_num_rows($ResultN);

?>