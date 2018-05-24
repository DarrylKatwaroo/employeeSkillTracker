<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();	
}

$id = $_GET['personID'];

require("../../services/connection.php");

$personToFind = "SELECT *
				 FROM adopter
				 WHERE adopter.adopterID = '$id'";
				 
 $queryResult = mysqli_query($con,$personToFind);
 
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css"> 
	<link rel="stylesheet" href=""> 
</head>
<body>
	<ul class="nav nav-tabs nav-justified">
		<li><a href="../../index.html">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="../endSession.php">Sign out</a></li>
	</ul>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="http://localhost/savePuppies/php/clerk/clerkWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/clerk/regAdopterForm.php" class="list-group-item">Register Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/editAdopterForm.php" class="list-group-item">Edit Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class="active list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Search Results</h2>
				<div class="row">
					<div class="">

					<?php
					echo "<table class='table table-striped table-bordered table-hover'>					
						  <tr>
							<th>AdopterID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th>National ID</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Registered By</th>			
						  </tr>";
						  	
					while($rows = mysqli_fetch_array($queryResult)){
										$id = $rows['adopterID'];
								echo "<tr class='text-center'>
										<td>".$rows['adopterID']."</td>
										<td>".$rows['firstName']."</td>
										<td>".$rows['lastName']."</td>
										<td>".$rows['address']."</td>
										<td>".$rows['gender']."</td>
										<td>".$rows['dateOfBirth']."</td>
										<td>".$rows['nationalIDnumber']."</td>
										<td>".$rows['email']."</td>
										<td>".$rows['contact']."</td>
										<td>".$rows['clerkID']."</td>
										<td><a href='editAdopter.php?id=$id'>Edit</a></td>
									  </tr>";}
					
								echo "</table>";
					?>
					
					</div>
				</div>
            </div>
        </div>
    </div>

<script src="../../js/bootstrap.min.js"></script>
</body>

</html>
