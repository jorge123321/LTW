<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	include_once('database/reply.php');
	include_once('database/review.php');
	include_once('database/user.php');
	include('templates/header.php');
	include('templates/signup.php');
	include('templates/footer.php');
?>

