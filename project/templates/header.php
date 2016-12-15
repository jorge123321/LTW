<!DOCTYPE html>
<html>
	<head>
		<title>RRestaurant</title>
		<link rel="stylesheet" href="css/main.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
		<script src="main.js"></script>
	</head>
	<body>
		<div id="header">
			<div id="menu">
				<ul>
					<li><button id="home" class="menu_button" type="button"> RRestaurant</button></li>
					<?php
					if (isset($_SESSION['idUser'])){
						if($_SESSION['type'] == 'owner'){
								echo '<li><button id="restaurantsOwner" class="menu_button" type="button">My Restaurants</a></li>';
								echo '<li><button id="restaurantAdd" class="menu_button" type="button">Add Restaurant</a></li>';
						}
						echo '<li><button id="myacc" class="menu_button" type="button">My Account</button></li>';
						echo '<li><button id="logout" class="menu_button" type="button">Logout</a></li>';
					}
					else{
						echo '<li><button id="login" class="menu_button" type="button">Login</button></li>';
						echo '<li><button id="signup" class="menu_button" type="button">Signup</button></li>';		
					}
					?>
				</ul>
			</div>		
		
			<form id="loginForm" action="login_action.php" method="post">
				<input type="text" id="login_username" name="username" placeholder="username" required><br>
				<input type="password"  id="login_pass" name="pass" placeholder="password" required><br>
				<button type="submit" id="login_button" >Log in</button>
			</form>
		
		</div>