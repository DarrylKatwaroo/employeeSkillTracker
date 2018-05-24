<?php
session_start();
if(!isset($_SESSION['staffID'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();
}

if(!isset($_POST['searchSubmit'])){
	Header("Location:../../html/clerkLoginForm.html");
	die();	
}

$search = $_POST['search'];

if($search == "-->please select-->" || $search == null || $search == ""){
	Header("Location:searchAdopterErrorForm.php");
	die();
}

$nameParts = explode(" ", $search);

$FIRSTname = $nameParts[0];
$LASTname = $nameParts[1];

require('../../services/connection.php');

$personToFind = "SELECT *
				 FROM adopter
				 WHERE adopter.firstName = '$FIRSTname'
				 AND adopter.lastName = '$LASTname'";
				 
 $queryResult = mysqli_query($con,$personToFind);
 
  
if(mysqli_num_rows($queryResult)>0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css"> 
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
                <h2 class="page-header">Search Results</h2>
				<div class="row">
					<div class="">

					<?php
					echo "<table class='table table-striped table-bordered table-hover'>					
						  <tr>
							<th>AdopterID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th>National ID</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Registered By</th>			
						  </tr>";
						  	
					while($rows = mysqli_fetch_array($queryResult)){
										$id = $rows['adopterID'];
								echo "<tr>
										<td>".$rows['adopterID']."</td>
										<td>".$rows['firstName']."</td>
										<td>".$rows['lastName']."</td>
										<td>".$rows['address']."</td>
										<td>".$rows['gender']."</td>
										<td>".$rows['dateOfBirth']."</td>
										<td>".$rows['nationalIDnumber']."</td>
										<td>".$rows['email']."</td>
										<td>".$rows['contact']."</td>
										<td>".$rows['clerkID']."</td>
										<td><a href='editAdopter.php?id=$id'>Edit</a></td>
									  </tr>";}
					
								echo "</table>";}
					?>
					
					</div>
				</div>
            </div>
        </div>
    </div>

<script src="../../js/bootstrap.min.js"></script>
</body>

</html>
