<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}

$name = $_POST['dogName'];

if($name == "-->please select-->"){
	Header("Location:searchDogErrorForm.php");
	die();
}
require('../../services/connection.php');

$dogToFind = "SELECT *
			  FROM dog
			  WHERE dog.name = '$name'";
				 
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
	<script src="../../js/confirm.js"></script>
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
                    <a href="http://localhost/savePuppies/php/vet/vetWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/vet/regDogForm.php" class="list-group-item">Register Dog</a>
                    <a href="http://localhost/savePuppies/php/vet/searchDogForm.php" class=" active list-group-item">Search for dog by name</a>

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
										$id = $rows['dogID'];
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
										<td><a href='editDog.php?id=$id'>Edit</a></td>
										<td><a href='deleteDog.php?id=$id' onclick='return confirmDel();' >Delete</a></td>
									  </tr>";}
					
								echo "</table>";}
					?>
					
					</div>
				</div>
			
			
			
			
			 </div>
        </div>

    </div>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>