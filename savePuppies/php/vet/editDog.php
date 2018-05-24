<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
	die();
}

$id = $_GET['id'];

require('../../services/connection.php');

$dogToSelect = "SELECT *
			    FROM dog
			    WHERE dogID =$id";
				 
 $queryResult = mysqli_query($con,$dogToSelect);
 
  
if(mysqli_num_rows($queryResult)>0){
	while($row = mysqli_fetch_assoc($queryResult)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css"> 
	<script src="../../js/editDogForm.js"></script> 
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
                    <a href="http://localhost/savePuppies/php/vet/regDogForm.php" class="list-group-item">Register Dog</a>
                    <a href="http://localhost/savePuppies/php/vet/searchDogForm.php" class="active list-group-item">Search for dog by name</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Register Dog</h2>
				<form name="editDogForm" method="post" onsubmit="return(validate());" action="http://localhost/savePuppies/php/vet/updateDog.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo($id);  ?>">
						
							
							
					   <div class="form-group">
							<label for="newName">Name:</label>
							<input type="text"   name="newName" class="form-control" value="<?php echo $row['name']; ?>">
							<span class="text-danger" id="errorName"></span>
					  </div>
					  
					  <div class="form-group">
						  <label for="newBreed">Breed:</label>
						  <select class="form-control" name="newBreed">
								<option <?php if($row['breed'] == "Husky"){echo"selected='selected'";} ?>>Husky</option>
								<option <?php if($row['breed'] == "German Shepherd"){echo"selected='selected'";} ?>>German Shepherd</option>
								<option <?php if($row['breed'] == "Pompek"){echo"selected='selected'";} ?>>Pompek</option>
								<option <?php if($row['breed'] == "Labrador"){echo"selected='selected'";} ?>>Labrador</option>
						  </select>
					  </div>
					  
					  <div class="form-group radio-inline">
							<label for="newGender"><input type="radio" name="newGender" value="Male" <?php if($row['gender'] == "Male"){echo "checked= 'checked' ";} ?>>Male</label>
					  </div>
					  <div class="form-group radio-inline">
							<label for="newGender"><input type="radio" name="newGender" value="Female"<?php if($row['gender'] == "Female"){echo "checked= 'checked' ";} ?> >Female</label>
					  </div>
					  
					  <div class="form-group">
						  <label for="newDC">Dominant Colour:</label>
						  <select class="form-control" name="newDC">
								<option <?php if($row['dominantColour'] == "Brown"){echo"selected='selected'";} ?>>Brown</option>
								<option <?php if($row['dominantColour'] == "Black"){echo"selected='selected'";} ?>>Black</option>
								<option <?php if($row['dominantColour'] == "White"){echo"selected='selected'";} ?>>White</option>
								<option <?php if($row['dominantColour'] == "Grey"){echo"selected='selected'";} ?>>Grey</option>
						  </select>
					  </div>
					  
					  
					  
					  
					  <div class="form-group">
							<label for="newHeight">Height:</label>
							<input type="text"   name="newHeight" class="form-control" value="<?php echo $row['height']; ?>">
							<span class="text-danger" id="errorHeight"></span>
					  </div>
					  
					  <div class="form-group">
							<label for="newWeight">Weight:</label>
							<input type="text"   name="newWeight" class="form-control" value="<?php echo $row['weight']; ?>">
							<span class="text-danger" id="errorWeight"></span>
					  </div>
					  
					   <div class="form-group">
							<label for="newGenDesc">General Description:</label>
							<input type="text"  name="newGenDesc" class="form-control" value="<?php echo $row['generalDescription']; ?>">
							<span class="text-danger" id="errorDesc"></span>
					  </div>
					  	

					  <div class="form-group">
							<label for="newDF">Date Found:</label>
							<input type="date"  name="newDF" class="form-control"value="<?php echo $row['dateFound'];}} ?>" >
							<span class="text-danger" id="errorDF"></span>
					  </div>
					 
					  <div class="form-group">
							<label for="fileToUpload">Add Dog Image:</label>
							<input type="file" name="fileToUpload" id="fileToUpload"><br>
					  </div>
					  
					  <div class="form-group">
						  <label for="newStatus">Status:</label>
						  <select class="form-control" name="newStatus">
								<?php
								$statusID = $row['status'];
								require("../../services/connection.php");	
								$query="SELECT name, ID
										FROM status";
								$result = mysqli_query($con, $query);
								
								$query2 = "SELECT status.name, status.ID
										   FROM dog,status
										   WHERE status.ID = dog.status
										   AND dog.dogID = '$id'";
							    $varResult = mysqli_query($con, $query2);
								while($ro = mysqli_fetch_assoc($varResult)){
									$var2 = "";
									$var2 = $ro['name'];
									$var3 = $ro['ID'];
								}
										   
								
			
								while($statusNames = mysqli_fetch_array($result)){
									
									if($statusNames['name'] == $var2){
										echo "<option selected='selected' value='".$var3."'>" .$statusNames['name']. "</option>";
										
									}else{
										echo "<option value = '".$statusNames['ID']."'>" .$statusNames['name']. "</option>"; 
									} 
									
								}
								?>
						  </select>
					  </div>

					  <button type="submit" class="btn btn-default" name="newDogSubmit">Submit</button>
				</form>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>

