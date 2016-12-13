<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	$result = getRestaurantItem($db, array($_GET['id']));
	include('templates/header.php');
	include('templates/restaurant_item.php');
	include('templates/footer.php');
 ?>