<?php
session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}


require("../../services/connection.php");	
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
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class=" active list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="list-group-item">View dogs that can be adopted</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">Search for Adopter</h2>
				<form method="post" action="http://localhost/savePuppies/php/clerk/searchAdopter.php">
					  <div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="glyphicon glyphicon-exclamation-sign"></i>&nbsp;<strong>None selected.&nbsp;</strong>Please select an opton from the list 
					  </div>
					  <div class="form-group">
						  <label for="edit">Select an adopter from the list to view their details:</label>
						  <select class="form-control" name="search">
								<option disabled selected="selected">-->please select--></option>
								<?php
								$query="SELECT *
										FROM adopter";
								$result = mysqli_query($con, $query);
			
								while($names = mysqli_fetch_array($result)){
									echo '<option>' .$names['firstName']." ".$names['lastName']. '</option>'; 
								} 		
								?>
						  </select>
					  </div>				 
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>
