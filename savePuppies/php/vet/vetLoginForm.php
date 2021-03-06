<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css"> 
	<link rel="stylesheet" href="../../css/clerkLoginForm.css"> 
</head>
<body>
	<div class="container">
	<ul class="nav nav-tabs nav-justified">
		<li><a href="../../index.html">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
		<li class="dropdown active">
			<a class="dropdown-toggle" data-toggle="dropdown">
			Sign In<span class="caret"></span></a>
		    <ul class="dropdown-menu">
				<li><a href="http://localhost/savePuppies/html/clerkLoginForm.html">Clerk</a></li>
				<li><a href="http://localhost/savePuppies/html/vetLoginForm.html">Veterinarian</a></li>
			</ul>
		</li>
	</ul>
	<div class=" rowCol row">
		<div class=" col1 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
		<h3 class="page-header text-center">Veterinarian Login Area</h3>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="glyphicon glyphicon-exclamation-sign"></i><strong><?php echo $_GET['feedback']; ?></strong> The username and password you entered is incorrect. 
		</div>
		<form class="formDiv" method="post" action="http://localhost/savePuppies/php/vet/vetLogin.php">
		  <div class="form-group">
			<label for="uname">Username:</label>
			<input class="form-control" type="text" name="uname" placeholder="username"/>
		  </div>
		  <div class="form-group">
			<label for="pwd">Password:</label>
			<input class="form-control" type="password"  name="pwd" placeholder="password"/>
		  </div>
		  <input class="btn btn-default btn-lg btn-block" type="submit" name="loginSubmit" value="Sign in">
		</form>
		</div>
	</div>
	  </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>