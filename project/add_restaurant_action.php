<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	$stmt = $db->prepare('SELECT name FROM Restaurant WHERE name = ?');
	$stmt->execute(array($_POST['name']));
	$result = $stmt->fetchAll();
?>
	<div id="content">
<?php
	if ($result == null){
		$stmt = $db->prepare('INSERT INTO User (idRestaurant, name, location, price, category, open, end, description, idOwner) VALUES (?,?,?,?,?,?,?,?,?)');
		$stmt->execute(array(null,$_POST['name'],$_POST['location'],$_POST['price'],$_POST['category'],$_POST['open'],$_POST['end'],$_POST['description'],$_POST['idOwner']));
		echo '<p>The restaurant was created sucessfully!</p>';
	}else{
		echo '<p>Could not sign up because the name of the restaurant already exists!</p>';
	}
?>
	</div>
<?php
	include ('templates/footer.php');
?>
