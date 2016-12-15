<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	include_once('database/reply.php');
	include_once('database/review.php');
	include_once('database/user.php');
	$result = getRestaurantItem($db, array($_GET['id']));
	include('templates/header.php');
	include('templates/restaurant_item.php');
	include('templates/footer.php');
 ?>