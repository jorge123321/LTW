<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	deleteRestaurant($db, $_POST['id']);
	header("Location: main.php");
?>