<?php
session_start();
    include ('templates/header.php');    
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	
?>
	<div id="content">
<?php		

		if(getRestaurantID($db,  $_POST['name']) != NULL){
			echo '<p> Restaurant already exists with that name! </p>';
		}
		else {
		addRestaurant($db,$_POST['name'],$_POST['location'],$_POST['price'],$_POST['category'],$_POST['open'],$_POST['close'],$_POST['description'],$_SESSION['idUser']);
		echo '<p>The restaurant was created sucessfully!</p>';
		}
		
		$result = getRestaurantID($db, $_POST['name']);


		$n_files = count($_FILES['image']['name']);
		for($i=0; $i<$n_files; $i++) {
					$totalSize += $_FILES['image']['size'][$i];
		}
		
		if($totalSize < 25000000){
		for($i=0; $i<$n_files; $i++){
			$extension = pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
			if($extension != "jpg" && $extension != "png" && $extension != "jpeg") 
					echo "Sorry, only JPG, JPEG, and PNGfiles are allowed."; 
			else {
				$picturePath = 'images/' . $_POST['name'] . '_' . $i . '.' . $extension;
				if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $picturePath)){
					$stmt = $db->prepare('INSERT INTO Photo (idPhoto, idRestaurant, idOwner, text) VALUES (NULL,?,?,?)');
					$stmt->execute(array($result['idRestaurant'], $_SESSION['idUser'], $picturePath));
				}
			}
			}
		}
?>
	</div>
<?php
	include ('templates/footer.php');
?>
