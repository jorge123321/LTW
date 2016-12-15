<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	session_start();
?>
	<div id="content">
<?php		
		$result = getRestaurantID($db, $_POST['name']);
		
		$n_files = count($_FILES['image']['name']);
		echo '<p>' . $n_files . '</p>';
		for($i=0; $i<$n_files; $i++){
			$extension = pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
			$picturePath = 'images/' . $_POST['name'] . '_' . $i . '.' . $extension;
			if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $picturePath)){
				$stmt = $db->prepare('INSERT INTO Photo (idPhoto, idRestaurant, idOwner, text) VALUES (NULL,?,?,?)');
				$stmt->execute(array($result['idRestaurant'], $_SESSION['idUser'], $picturePath));
				echo '<p> added photos success</p>';
			}
		}
		
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
		
		/*foreach($path as $tmpath){
		$stmt = $db->prepare('INSERT INTO Photo (idPhoto, idRestaurant, idOwner, text) VALUES (NULL,?,?,?)');
		$stmt->execute(array($result['idRestaurant'], $_SESSION['idUser'], $tmpath));
		echo '<p> added photos success</p>';
		}*/
?>
	</div>
<?php
	include ('templates/footer.php');
?>
