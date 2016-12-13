<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	include('templates/header.php');
	include('templates/owner_restaurants.php');
	include('templates/footer.php');
 ?>