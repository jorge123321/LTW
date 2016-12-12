<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
?>
	<div id="content">
<?php

		$stmt = $db->prepare('INSERT INTO Restaurant (idRestaurant, name, location, price, category, open, end, description, idOwner) VALUES (?,?,?,?,?,?,?,?,?)');
		$stmt->execute(array(null,$_POST['name'],$_POST['location'],$_POST['price'],$_POST['category'],$_POST['open'],$_POST['end'],$_POST['description'],$_SESSION['idUser']));
		echo '<p>The restaurant was created sucessfully!</p>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
