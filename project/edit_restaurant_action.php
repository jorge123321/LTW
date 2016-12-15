<?php
	session_start();
	include ('templates/header.php');  
	include_once('database/connection.php');
	include_once('database/restaurant.php');

	?>
	<div id="content">
	<?php
		include_once getcwd() . "/database/connection.php";
		include_once getcwd() . "/database/restaurant.php";
		$result = getRestaurantItem($db, $_POST['id_rest']);
		
	if ($result['name'] != $_POST['name']){
		updateNameR($db, $_POST['name'],$_POST['id_rest']);
		echo '<p>Name changed.</p><br>';
	}

	if ($result['location'] != $_POST['location']){
		updateLocationR($db, $_POST['location'],$_POST['id_rest']);
		echo '<p>Location changed.</p><br>';
	}
	
	if ($result['price'] != $_POST['price']){
		updatePriceR($db, $_POST['price'],$_POST['id_rest']);
		echo '<p>Location changed.</p><br>';
	}
	if ($result['open'] != $_POST['open']){
		updateOpenR($db, $_POST['open'],$_POST['id_rest']);
		echo '<p>Open changed.</p><br>';
	}
	
	if ($result['end'] != $_POST['close']){
		updateCloseR($db, $_POST['close'],$_POST['id_rest']);
		echo '<p>Close changed.</p><br>';
	}
	
	if ($result['description'] != $_POST['description']){
		updateDescriptionR($db, $_POST['description'],$_POST['id_rest']);
		echo '<p>description changed.</p><br>';
	}
	
?>
	</div>
<?php
	include ('templates/footer.php');
?>