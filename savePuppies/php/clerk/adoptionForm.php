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
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<script src="../../js/search.js"></script>
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
			<div class="col-md-3">
                <div class="list-group">
                   <a href="http://localhost/savePuppies/php/clerk/clerkWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/clerk/regAdopterForm.php" class="list-group-item">Register Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class="list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="active list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="list-group-item">View dogs that can be adopted</a>
                </div>
            </div>
			<div class="col-md-8">
                <h2 class="page-header">Record an Adoption</h2>
				<form class="form" method="post" action="http://localhost/savePuppies/php/clerk/adoption.php">
				   

					 <div class="form-group">
						  <label for="edit">Select a dog to be adopted</label>
						  <select class="form-control" name="dogID">
								<option selected="selected">-->please select--></option>
								<?php

								require("../../services/connection.php");	
								$query="SELECT dog.name, dog.dogID
										FROM dog, status
										WHERE dog.status = status.ID
										AND status.name != 'Adopted'";
								$result = mysqli_query($con, $query);
			
								while($names = mysqli_fetch_array($result)){
									echo '<option value='.$names['dogID']. '>' .$names['name']. '</option>'; 
								} 
								
								?>
						  </select>
					  </div>
					   <div class="form-group">
						  <label for="edit">Select an adopter from the list to view their details:</label>
						  <select class="form-control" name="adopterID">
								<option selected="selected">-->please select--></option>
								<?php
								
								require("../../services/connection.php");	
								$query="SELECT *
										FROM adopter";
								$result = mysqli_query($con, $query);
			
								while($names = mysqli_fetch_array($result)){
									echo '<option value=' .$names['adopterID']. '>' .$names['firstName']." ".$names['lastName']. '</option>'; 
								} 	
								
								?>
						  </select>
					  </div>
				
				  <button type="submit" name="adoptionFormSubmit" class="btn btn-default">Submit</button>
				</form>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>
