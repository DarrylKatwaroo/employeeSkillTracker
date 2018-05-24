<?php

session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/vetLoginForm.html");
	die();
}

include("fit.php");

include("unfit.php");


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
                    <a href="http://localhost/savePuppies/php/vet/regDogForm.php" class="list-group-item">Register Dog</a>
                    <a href="http://localhost/savePuppies/php/vet/searchDogForm.php" class=" active list-group-item">Search for dog by name</a>
					
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2 class="page-header">View Dog by Name</h2>
				
	<div id="accordion" class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="my_class" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Search all dogs</a>
				</h4>
			</div>
				<div id="collapseOne" class="panel-collapse collapse">
					<div class="panel-body">
						<form method="post" action="http://localhost/savePuppies/php/vet/searchDog.php">
					  <div class="form-group">
						  <label for="edit">Select a dog from the list to view its details:</label>
						  <select class="form-control" name="dogName">
								<option selected="selected">-->please select--></option>
								<?php

								require("../../services/connection.php");	
								$query="SELECT *
										FROM dog";
								$result = mysqli_query($con, $query);
			
								while($names = mysqli_fetch_array($result)){
									echo '<option>' .$names['name']. '</option>'; 
								} 
								
								?>
						  </select>
					  </div>				 
				  <button type="submit" class="btn btn-default">Search</button>
				</form>
					</div>
				</div>	
		</div> <!--end of first form -->	


				
						
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="my_class" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Search Fit dogs &nbsp;<span class="badge"><?php echo $fit; ?></span></a>
				</h4>
			</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<form method="post" action="http://localhost/savePuppies/php/vet/searchDog.php">
					  <div class="form-group">
						  <label for="edit">Select a dog from the list to view its details:</label>
						  <select class="form-control" name="dogName">
								<option selected="selected">-->please select--></option>
								<?php
								
								require("../../services/connection.php");	
								$query="SELECT dog.name
										FROM dog,status
										WHERE dog.status = status.ID
										AND status.name = 'Ready for Adoption'";
								$result = mysqli_query($con, $query);
			
								while($names = mysqli_fetch_array($result)){
									echo '<option>' .$names['name']. '</option>'; 
								} 
								
								?>
						  						  </select>
					  </div>				 
				  <button type="submit" class="btn btn-default">Search</button>
				</form>
					</div>
				</div>	
		</div><!--end of second form -->

				
				
				
				
				<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="my_class" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Search Unfit Dogs &nbsp;<span class="badge"><?php echo $unfit;   ?></span></a>
				</h4>
			</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						<form method="post" action="http://localhost/savePuppies/php/vet/searchDog.php">
					  <div class="form-group">
						  <label for="edit">Select a dog from the list to view its details:</label>
						  <select class="form-control" name="dogName">
								<option selected="selected">-->please select--></option>
								<?php

								require("../../services/connection.php");	
								$query="SELECT dog.name
										FROM dog,status
										WHERE dog.status = status.ID
										AND status.name = 'Not Ready for Adoption'";
								$result = mysqli_query($con, $query);
			
								while($names = mysqli_fetch_array($result)){
									echo '<option>' .$names['name']. '</option>'; 
								} 
								
								?>
						 				  </select>
					  </div>				 
				  <button type="submit" class="btn btn-default">Search</button>
				</form>
					</div>
				</div>	
		</div><!--end of third form -->
				
				
	</div>			
				
				
						
						
						
						
						
						
            </div>
        </div>

    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
