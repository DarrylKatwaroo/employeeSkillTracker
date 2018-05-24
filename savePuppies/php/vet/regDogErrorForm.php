<?php
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
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
	<link rel="stylesheet" href=""> 
</head>
<body>
	<ul class="nav nav-tabs nav-justified">
		<li><a href="../../index.html">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="../../services/endSession.php">Sign out</a></li>
	</ul>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="http://localhost/savePuppies/php/vet/vetWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/vet/regDogForm.php" class=" active list-group-item">Register Dog</a>
                    <a href="http://localhost/savePuppies/php/vet/viewDogForm.php" class="list-group-item">Find dog by ID OR Name</a>
                    <a href="http://localhost/savePuppies/php/vet/fitDogs.php" class="list-group-item">View number of dogs that are ready for adoption</a>
					<a href="http://localhost/savePuppies/php/vet/unfitDogs.php" class="list-group-item">View  number of dogs that are NOT FIT to be adopted </a>
					<a href="http://localhost/savePuppies/php/vet/deleteDogForm.php" class="list-group-item">Delete records for a dog </a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Register Dog</h2>
				<form name="regDogForm" method="post" action="http://localhost/savePuppies/php/vet/regDog.php" enctype="multipart/form-data" >
					   <div class="form-group">
							<label for="name">Name:</label>
							<input type="text" id="name"   name="name" class="form-control">
							<span><?php if(!empty($errorName)){echo($errorName); }?></span>
					  </div>
					  
					  <div class="form-group">
						  <label for="breed">Breed:</label>
						  <select class="form-control" id="breed" name="breed">
								<option selected = "selected" value="noselect">-->please select--></option>
								<option>Husky</option>
								<option>German Shepherd</option>
								<option>Pomeranian</option>
								<option>Golden Retriever</option>
								<option>Great Dane</option>
								<option>Pug</option>
								<option>Bulldog</option>
								<option>Labrador</option>
						  </select>
						  <span><?php if(!empty($errorBreed)){echo($errorBreed); }?></span>
					  </div>
					  
					  <div class="form-group radio-inline">
							<label for="gender"><input type="radio" checked="checked" name="gender" value="Male">Male</label>
					  </div>
					  <div class="form-group radio-inline">
							<label for="gender"><input type="radio" name="gender" value="Female">Female</label>
					  </div>
					  
					  <div class="form-group">
						  <label for="dominantColour">Dominant Colour:</label>
						  <select class="form-control" id="dominantColour" name="dominantColour">
								<option selected = "selected" value="noselect">-->please select--></option>
								<option>Brown</option>
								<option>Black</option>
								<option>White</option>
								<option>Grey</option>
						  </select>
						  <span><?php if(!empty($errorDC)){echo($errorDC); }?></span>
					  </div>
					  
					  <div class="form-group">
							<label for="height">Height:</label>
							<input type="text" id="height"  name="height" class="form-control">
							<span><?php if(!empty($errorHeight)){echo($errorHeight); }?></span>
					  </div>
					  
					  <div class="form-group">
							<label for="weight">Weight:</label>
							<input type="text" id="weight"  name="weight" class="form-control">
							<span><?php if(!empty($errorWeight)){echo($errorWeight); }?></span>
					  </div>
					  
					   <div class="form-group">
							<label for="genDesc">General Description:</label>
							<input type="text" id="genDesc"  name="genDesc" class="form-control">
							<span><?php if(!empty($errorDesc)){echo($errorDesc); }?></span>
					  </div>
					  	

					  <div class="form-group">
							<label for="dateFound">Date Found:</label>
							<input type="date" id="dateFound"  name="dateFound" class="form-control">
							<span><?php if(!empty($errorDF)){echo($errorDF); }?></span>
					  </div>
					  
					  <div class="form-group">
							<label for="fileToUpload">Add Dog Image:</label>
							<input type="file" name="fileToUpload" id="fileToUpload"><br /><!--this collects a file from your computer-->
					  </div>
					  
					  <div class="form-group">
						  <label for="status">Status:</label>
						  <select class="form-control" id="status" name="status">
								<option selected = "selected" value="noselect">-->please select--></option>
								<?php

								require("../../services/connection.php");	
								$query = "SELECT status.name
										  FROM status";
								$result = mysqli_query($con,$query);
			
								while($row = mysqli_fetch_array($result)){
									echo "<option>" .$row['name']. "</option>"; 
								} 
								
								?>
						  </select>
						  <span><?php if(!empty($errorStatus)){echo($errorStatus); }?></span>
					  </div>

					  <button type="submit" class="btn btn-default" name="regDogSubmit">Submit</button>
				</form>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
