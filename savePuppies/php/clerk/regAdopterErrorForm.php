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
                    <a href="http://localhost/savePuppies/php/clerk/clerkWelcome.php" class="list-group-item">Welcome</a>
                    <a href="http://localhost/savePuppies/php/clerk/regAdopterForm.php" class=" active list-group-item">Register Adopter</a>
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class="list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="list-group-item">View dogs that can be adopted</a>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Register Adopter</h2>
				<form method="post" action="http://localhost/savePuppies/php/clerk/regAdopter.php">
					   <fieldset>
						   <div class="form-group">
								<label for="name">First Name:</label>
								<input type="text" name="fname" class="form-control">
								<span><?php if(!empty($errorFname)){echo($errorFname); }?></span>
						  </div>
						  <div class="form-group">
								<label for="name">Last Name:</label>
								<input type="text" name="lname" class="form-control">
								<span><?php if(!empty($errorLname)){echo($errorLname); }?></span>
						  </div>
						   <div class="form-group">
								<label for="address">Address:</label>
								<input type="text" name="address" class="form-control">
								<span><?php if(!empty($errorAddress)){echo($errorAddress); }?></span>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input type="radio" name="gender" value="Male">Male</label>
						  </div>
						  <div class="form-group radio-inline">
								<label for="gender"><input type="radio" name="gender" value="Female">Female</label>
								
						  </div>
						  <div class="form-group">
								<label for="doB">Date of Birth:</label>
								<input type="text" name="doB" class="form-control">
								<span><?php if(!empty($errorDOB)){echo($errorDOB); }?></span>
						  </div>
						  <div class="form-group">
								<label for="n_id">National ID:</label>
								<input type="text" name="n_id" class="form-control">
								<span><?php if(!empty($errorNID)){echo($errorNID); }?></span>
						  </div>
						  <div class="form-group">
								<label for="email">Email:</label>
								<input type="text" name="email" class="form-control">
								<span><?php if(!empty($errorEmail)){echo($errorEmail); }?></span>
						  </div>
						  <div class="form-group">
								<label for="contact">Contact No:</label>
								<input type="text" name="contact" class="form-control">
								<span><?php if(!empty($errorContact)){echo($errorContact); }?></span>
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
