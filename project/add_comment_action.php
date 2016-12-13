<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	session_start();
?>
	<div id="content">
<?php
	$stmt = $db->prepare('INSERT INTO RestaurantReview (idUser, idRestaurant, score, text) VALUES (?,?,?,?)');
	$stmt->execute(array($_SESSION['idUser'],$_SESSION['idRestaurant'],$_POST['score'],$_POST['text']));
	echo '<p>The comment was made sucessfully!</p>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
