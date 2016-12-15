<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	include('templates/header.php');
	include('templates/edit_restaurant.php');
	include('templates/footer.php');
 ?>