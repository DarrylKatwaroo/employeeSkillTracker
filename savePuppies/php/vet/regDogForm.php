<?php

session_start();
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
	<script src="../../js/regDogForm.js"></script>
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
                    <a href="http://localhost/savePuppies/php/vet/regDogForm.php" class="active list-group-item">Register Dog</a>
                    <a href="http://localhost/savePuppies/php/vet/searchDogForm.php" class="list-group-item">Search for dog by name</a>
					
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Register Dog</h2>
				<form name="regDogForm" onsubmit="return(validate());" method="post" action="http://localhost/savePuppies/php/vet/regDog.php" enctype="multipart/form-data" >
					   <fieldset>
						   <div class="form-group">
								<label for="name">Name:</label>
								<input type="text" id="name" name="name" class="form-control">
								<span class="text-danger" id="errorName"></span>
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
							  <span class="text-danger" id="errorBreed"></span>
						</div>
					  
					  
						  <div class="form-group">
							  <label for="domCol">Dominant Colour:</label>
							  <select class="form-control" id="domCol" name="domCol">
									<option selected = "selected" value="noselect">-->please select--></option>
									<option>Brown</option>
									<option>Black</option>
									<option>White</option>
									<option>Gray</option>
							  </select>
							  <span class="text-danger" id="errorDC"></span>
						</div>
						  
						  
						  
						  
						  <div class="form-group radio-inline">
								<label for="gender"><input checked="checked" type="radio" name="gender" value="Male">Male</label>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input type="radio" name="gender" value="Female">Female</label>
						  </div>
						  
						  
						  <div class="form-group">
							<label for="height">Height:</label>
							<input type="text" id="height"  name="height" placeholder="00.00" class="form-control">
							<span class="text-danger" id="errorHeight"></span>
						</div>
						  
						  
						  
						  
						  <div class="form-group">
							<label for="weight">Weight:</label>
							<input type="text" id="weight"  name="weight" placeholder="00.00" class="form-control">
							<span class="text-danger" id="errorWeight"></span>
					  </div>
					  <div class="form-group">
								<label for="genDesc">General Description:</label>
								<input type="text" id="genDesc" name="genDesc" class="form-control">
								<span class="text-danger" id="errorDesc"></span>
						  </div>
					  
					  
					  
					  
					    <div class="form-group">
							<label for="dateFound">Date Found:</label>
							<input type="date" id="dateFound"  name="dateFound" class="form-control">
							<span class="text-danger" id="errorDF"></span>
					  </div>

					  
					    <div class="form-group">
							<label for="fileToUpload">Add Dog Image:</label>
							<input type="file" name="fileToUpload" id="fileToUpload"><br>
					  </div>
					  
					  <div class="form-group">
						  <label for="Status">Status:</label>
						  <select class="form-control" id="Status" name="Status">
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
						  <span class="text-danger" id="errorStatus"></span>
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