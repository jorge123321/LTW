<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	session_start();
?>
	<div id="content">
<?php

		$stmt = $db->prepare('INSERT INTO RestaurantReview (idReview, idReviewer, idRestaurant, score, text) VALUES (NULL,?,?,?,?)');
		$stmt->execute(array($_SESSION['idUser'], $_GET['id'], $_POST['score'], $_POST['comment']));
		echo '<p>The restaurant was created sucessfully!</p>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
