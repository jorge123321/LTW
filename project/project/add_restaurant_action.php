<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	session_start();
?>
	<div id="content">
<?php
		echo '<p>' . $_POST['name'] . '</p>';
		echo '<p>' . $_POST['location'] . '</p>';
		echo '<p>' . $_POST['price'] . '</p>';
		echo '<p>' . $_POST['category'] . '</p>';
		echo '<p>' . $_POST['open'] . '</p>';
		echo '<p>' . $_POST['close'] . '</p>';
		echo '<p>' . $_POST['description'] . '</p>';
		echo '<p>' . $_SESSION['idUser'] . '</p>';
		$stmt = $db->prepare('INSERT INTO Restaurant (idRestaurant, name, location, price, category, open, end, description, idOwner) VALUES (NULL,?,?,?,?,?,?,?,?)');
		$stmt->execute(array($_POST['name'],$_POST['location'],$_POST['price'],$_POST['category'],$_POST['open'],$_POST['close'],$_POST['description'],$_SESSION['idUser']));
		echo '<p>The restaurant was created sucessfully!</p>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
