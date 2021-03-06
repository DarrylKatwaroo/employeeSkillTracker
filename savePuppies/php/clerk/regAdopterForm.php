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
	<script src="../../js/search.js"></script>
	<script src="../../js/regAdopterForm.js"></script>
	<link rel="stylesheet" href=""> 
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
                    <a href="http://localhost/savePuppies/php/clerk/regAdopterForm.php" class="active list-group-item">Register Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class="list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="list-group-item">View dogs that can be adopted</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Register Adopter</h2>
				<form name="regAdopterForm" onsubmit="return(validate());" method="post" action="http://localhost/savePuppies/php/clerk/regAdopter.php">
					   <fieldset>
						   <div class="form-group">
								<label for="name">First Name:</label>
								<input type="text" id="fname" name="fname" class="form-control">
								<span class="text-danger" id="errorFname"></span>
						  </div>
						  <div class="form-group">
								<label for="name">Last Name:</label>
								<input type="text" id="lname" name="lname" class="form-control">
								<span class="text-danger"  id="errorLname"></span>
						  </div>
						   <div class="form-group">
								<label for="address">Address:</label>
								<input type="text" id="address" name="address" class="form-control">
								<span class="text-danger"  id="errorAddress"></span>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input checked="checked" type="radio" name="gender" value="Male">Male</label>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input type="radio" name="gender" value="Female">Female</label>
						  </div>
						  <div class="form-group">
								<label for="doB">Date of Birth:</label>
								<input type="date" id="doB" name="doB" class="form-control">
								<span class="text-danger" id="errorDOB"></span>
						  </div>
						  <div class="form-group">
								<label for="n_id">National ID:</label>
								<input type="text" id="n_id" name="n_id" class="form-control">
								<span class="text-danger" id="errorNID"></span>
						  </div>
						  <div class="form-group">
								<label for="email">Email:</label>
								<input type="text" id="email" name="email" class="form-control">
								<span class="text-danger" id="errorEmail"></span>
						  </div>
						  <div class="form-group">
								<label for="contact">Contact No:</label>
								<input type="text" id="contact" name="contact" class="form-control">
								<span class="text-danger" id="errorContact"></span>
						  </div>
					  </fieldset>
					  <button type="submit" class="btn btn-default" name="regSubmit">Submit</button>
				</form>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
