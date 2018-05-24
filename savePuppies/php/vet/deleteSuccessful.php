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
		<li><a href="../endSession.php">Sign out</a></li>
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
			<h2 class="page-header">Search Results</h2>
			<div class="jumbotron">Record deleted successfully.</div>
			
			
			
			
			
			</div>
        </div>

    </div>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>