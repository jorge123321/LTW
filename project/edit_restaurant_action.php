<?php
	session_start();
	include ('templates/header.php');  
	include_once('database/connection.php');
	
	?>
	<div id="content">
	<?php
		include_once getcwd() . "/database/connection.php";
		include_once getcwd() . "/database/restaurant.php";
		$result = getRestaurantItem($db, $_POST['id_rest']);
		
	if ($result['name'] != $_POST['name']){
		$stmt = $db->prepare("UPDATE Restaurant SET name=? WHERE idRestaurant=?");
		$stmt->execute(array($_POST['name'],$_POST['id_rest']));
		echo '<p>Name changed.</p><br>';
	}

	if ($result['location'] != $_POST['location']){
		$stmt = $db->prepare("UPDATE Restaurant SET location=? WHERE idRestaurant=?");
		$stmt->execute(array($_POST['location'],$_POST['id_rest']));
		echo '<p>Location changed.</p><br>';
	}
	
	if ($result['price'] != $_POST['price']){
		$stmt = $db->prepare("UPDATE Restaurant SET price=? WHERE idRestaurant=?");
		$stmt->execute(array($_POST['price'],$_POST['id_rest']));
		echo '<p>Location changed.</p><br>';
	}
	if ($result['open'] != $_POST['open']){
		$stmt = $db->prepare("UPDATE Restaurant SET open=? WHERE idRestaurant=?");
		$stmt->execute(array($_POST['open'],$_POST['id_rest']));
		echo '<p>Open changed.</p><br>';
	}
	
	if ($result['end'] != $_POST['close']){
		$stmt = $db->prepare("UPDATE Restaurant SET end=? WHERE idRestaurant=?");
		$stmt->execute(array($_POST['close'],$_POST['id_rest']));
		echo '<p>Close changed.</p><br>';
	}
	
	if ($result['description'] != $_POST['description']){
		$stmt = $db->prepare("UPDATE Restaurant SET description=? WHERE idRestaurant=?");
		$stmt->execute(array($_POST['description'],$_POST['id_rest']));
		echo '<p>description changed.</p><br>';
	}
	
?>
	</div>
<?php
	include ('templates/footer.php');
?>