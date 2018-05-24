<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css"> 
</head> 

<?php

$personName=$_GET["value"];


$con = mysqli_connect("localhost","root","","stpdb");



$findPersonQuery="SELECT  adopterID, firstName, lastName 
				  FROM adopter 
				  WHERE firstName LIKE '%" . $personName .  "%' OR lastName LIKE '%" . $personName ."%'"; 
	  

$queryResult = mysqli_query($con, $findPersonQuery);

if(mysqli_num_rows($queryResult)>0){
$var = 0;	
	
	echo "<table class='table table-hover'>";
		
	while($myrows = mysqli_fetch_assoc($queryResult)){
			if($var >=6){
				die();
			}			
			echo "<tr>
					<td style='border-bottom:0.3px solid #eee'>".$myrows['firstName']." ".$myrows['lastName']."</td>
					<td style='border-bottom:0.3px solid #eee'><a href='personDetails.php?personID=".$myrows['adopterID']."'>View Details</a></td>
				  </tr>";
			$var++;
	}
	echo "</table>";
}else{
	echo"0 results found";
}	
	
  
	
?>

