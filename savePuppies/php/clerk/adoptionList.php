<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}

require("../../services/connection.php");

include("../vet/fit.php");

$dogToFind = "SELECT *
			  FROM dog
			  WHERE dog.status = (SELECT ID
			  FROM status 
			  WHERE status.name = 'Ready for Adoption')";
				 
$queryResult = mysqli_query($con,$dogToFind);
   
if(mysqli_num_rows($queryResult)>0){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
	<ul class="nav nav-tabs nav-justified">
		<li><a href="../../index.html">Home</a></li>
		<li><input id="searchBar" type="text" name="search" placeholder="Search.." onkeyup="userEntry(this.value)">
			<div id="liveSearch"></div>
		</li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="../../services/endSession.php">Sign out</a></li>
	</ul>
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="list-group">
                    <a href="http://localhost/savePuppies/php/clerk/clerkWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/clerk/regAdopterForm.php" class="list-group-item">Register Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class="list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="active list-group-item">View dogs that can be adopted</a>
                </div>
            </div>
			<!-- Content Column -->
            <div class="col-md-9 mainCol">
			<h1 class="page-header text-center"> Adoption List</h1>
			<?php
			echo "<table class='table table-striped table-bordered table-hover'>					
						  <tr>
							<th>Dog ID</th>
							<th>Name</th>
							<th>Breed</th>
							<th>Gender</th>
							<th>Dominant Colour</th>
							<th>Height</th>
							<th>Weight</th>
							<th>General Description</th>
							<th>Date Found</th>
							<th>Status</th>	
						    <th>Registered By</th>
						  </tr>";
						  	
					while($rows = mysqli_fetch_array($queryResult)){
								echo "<tr class='text-center'>
										<td>".$rows['dogID']."</td>
										<td> <img class='thumbnail' src='../../dogImgUploads/" .$rows['dogImage']. "' width ='115'>".$rows['name']."</td>
										<td>".$rows['breed']."</td>
										<td>".$rows['gender']."</td>
										<td>".$rows['dominantColour']."</td>
										<td>".$rows['height']."</td>
										<td>".$rows['weight']."</td>
										<td>".$rows['generalDescription']."</td>
										<td>".$rows['dateFound']."</td>
										<td>".$rows['status']."</td>
										<td>".$rows['vetID']."</td>
									  </tr>";}
					
								echo "</table>";}
					?>
			
			</div>
        </div>
    </div>
	<script src="../../js/search.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>