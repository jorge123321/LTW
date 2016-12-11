<!DOCTYPE html>
<html>
	<head>
		<title>RRestaurant</title>
		<link rel="stylesheet" href="css/main.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="main.js"></script>
	</head>
	<body>
		<div id="header">
				<h1> RRestaurant </h1>
			<div id="menu">
				<ul>
					<li><button id="home" type="button"> Home</button></li>
					<?php
					if (isset($_SESSION['idUser'])){
						if($_SESSION['type'] == 'owner'){
								echo '<li><button id="restaurantsOwner" type="button">My Restaurants</a></li>';
								echo '<li><button id="restaurantAdd" type="button">Add Restaurant</a></li>';
						}
						echo '<li><button id="myacc" type="button">My Account</button></li>';
						echo '<li><button id="logout" type="button">Logout</a></li>';
					}
					else{
						echo '<li><button id="login" type="button">Login</button></li>';
						echo '<li><button id="signup" type="button">Signup</button></li>';		
					}
					?>
				</ul>
			</div>		
		
			<form id="loginForm" action="login_action.php" method="post">
				Username:<br>
				<input type="text" name="username" value="required"><br>
				Pass:<br>
				<input type="password" name="pass" value="required"><br>
				<button type="submit">Log in</button>
			</form>
		
		</div>