<?php


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
	<link rel="stylesheet" href=""> 
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
                    <a href="http://localhost/savePuppies/php/clerk/searchAdopterForm.php" class=" active list-group-item">Search for Adopter by name</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionForm.php" class="list-group-item">Record Adoption</a>
					<a href="http://localhost/savePuppies/php/clerk/adoptionList.php" class="list-group-item">View dogs that can be adopted</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h1 class="jumbotron">Update Successful.</h1>
				
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>
