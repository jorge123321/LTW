<?php
session_start();
    include ('templates/header.php');    
	include_once('database/connection.php');
	
?>
	<div id="content">
<?php
		
		$stmt = $db->prepare('INSERT INTO RestaurantReview (idReview, idReviewer, idRestaurant, score, text) VALUES (NULL,?,?,?,?)');
		$stmt->execute(array($_SESSION['idUser'], $_POST['id'], $_POST['score'], $_POST['comment']));
		
		echo '<p>Comment made sucessfully!</p>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
