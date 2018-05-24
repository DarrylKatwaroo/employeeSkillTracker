<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();	
}

$id = $_GET['id'];

require('../../services/connection.php');

$personToSelect = "SELECT *
				   FROM adopter
				   WHERE adopterID =$id";
				 
 $queryResult = mysqli_query($con,$personToSelect);
 
  
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
	<link rel="stylesheet" href=""> 
	<script src="../../js/editAdopter.js"></script>
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
                    <a href="http://localhost/savePuppies/php/clerk/clerkWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/clerk/regAdopterForm.php" class="list-group-item">Register Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class=" active list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="list-group-item">View dogs that can be adopted</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>What would you like to edit?</h2>
				<div class="row">
					<div class="">
		
					
					<form method="post" name="editAdopterForm" onsubmit="return(validate());" action="http://localhost/savePuppies/php/clerk/updateAdopter.php">
							<input type="hidden" name="id" value="<?php echo($id);  ?>">
						   <div class="form-group">
								<label for="name">First Name:</label>
								<input type="text" name="newFname" class="form-control" value="<?php echo $row['firstName']; ?>">
								<span class="text-danger" id="errorFname"></span>
						  </div>
						  <div class="form-group">
								<label for="name">Last Name:</label>
								<input type="text" name="newLname" class="form-control" value="<?php echo $row['lastName']; ?>">
								<span class="text-danger" id="errorLname"></span>
						  </div>
						   <div class="form-group">
								<label for="address">Address:</label>
								<input type="text" name="newAddress" class="form-control"value="<?php echo $row['address']; ?>">
								<span class="text-danger" id="errorAddress"></span>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input type="radio" name="newGender" value="Male" <?php if($row['gender'] == "Male"){echo "checked= 'checked' ";} ?>>Male</label>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input type="radio" name="newGender" value="Female"<?php if($row['gender'] == "Female"){echo "checked= 'checked' ";} ?> >Female</label>
						  </div>
						  <div class="form-group">
								<label for="doB">Date of Birth:</label>
								<input type="date" name="newDoB" class="form-control" value="<?php echo $row['dateOfBirth']; ?>">
								<span class="text-danger" id="errorDOB"></span>
						  </div>
						  <div class="form-group">
								<label for="n_id">National ID:</label>
								<input type="text" name="newN_id" class="form-control" value="<?php echo $row['nationalIDnumber']; ?>">
								<span class="text-danger" id="errorNID"></span>
						  </div>
						  <div class="form-group">
								<label for="email">Email:</label>
								<input type="text" name="newEmail" class="form-control" value="<?php echo $row['email']; ?>" >
								<span class="text-danger" id="errorEmail"></span>
						  </div>
						  <div class="form-group">
								<label for="contact">Contact No:</label>
								<input type="text" name="newContact" class="form-control" value="<?php echo $row['contact']; }} ?>">
								<span class="text-danger" id="errorContact"></span>
						  </div>
					  <button type="submit" class="btn btn-default" name="editSubmit">Submit</button>
				</form>
					
					</div>
				</div>
            </div>
        </div>
    </div>

<script src="../../js/bootstrap.min.js"></script>
</body>

</html>
