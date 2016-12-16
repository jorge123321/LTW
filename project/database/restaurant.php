<?php

	include_once("database/review.php");
	include_once("database/reply.php");
	include_once("database/user.php");
	
	function getAllRestaurant($db){
		$stmt = $db->prepare('SELECT * FROM Restaurant');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function addRestaurant($db, $name,$location,$price,$category,$open,$close,$description,$idUser){
		$stmt = $db->prepare('INSERT INTO Restaurant (idRestaurant, name, location, price, category, open, end, description, idOwner) VALUES (NULL,?,?,?,?,?,?,?,?)');
		$stmt->execute(array($name,$location,$price,$category,$open,$close,$description,$idUser));
	}

	function getRestaurantItem($db, $id){
		$stmt = $db->prepare('SELECT * FROM Restaurant WHERE idRestaurant = ?');
		$stmt->execute($id);
		$result = $stmt->fetch();
		return $result;
	}

	function getRestaurantFromOwner($db, $owner){
		$stmt = $db->prepare('SELECT * FROM Restaurant WHERE idOwner = ?');
		$stmt->execute(array($owner));
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function getRestaurantID($db, $name){
		$stmt = $db->prepare('SELECT * FROM Restaurant WHERE name = ?');
		$stmt->execute(array($name));
		$result = $stmt->fetch()[0];
		return $result;
	}
	
	function getAllCategories($db){
		$stmt = $db->prepare('SELECT category FROM Restaurant GROUP BY category');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
 	
 	function deleteRestaurant($db,$idRestaurant) {
 		deleteReview($db,$idRestaurant);
		//delPhotos($db,$idRestaurant);
 		$stmt = $db->prepare('DELETE FROM Restaurant WHERE idRestaurant = ?');
 		$stmt->execute(array($idRestaurant));
 	}


	function averageScoreRestaurant($db,$idRestaurant) {
 		$stmt = $db->prepare('SELECT avg(score) FROM RestaurantReview WHERE idRestaurant = ?');
 		$stmt->execute(array($idRestaurant));
		$result = $stmt->fetch();
		return $result;
 	}
	
	function getPhotos($db, $idRestaurant){
		$stmt = $db->prepare('SELECT * FROM Photo WHERE idRestaurant = ?');
		$stmt->execute(array($idRestaurant));
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function delPhotos($db, $idRestaurant){
		$stmt = $db->prepare('DELETE * FROM Photo WHERE idRestaurant = ?');
		$stmt->execute(array($idRestaurant));

	}
	
	function updateNameR($db, $name, $idRestaurant){
		$stmt = $db->prepare("UPDATE Restaurant SET name=? WHERE idRestaurant=?");
		$stmt->execute(array($name,$idRestaurant));
	}
	
	function updateLocationR($db, $location, $idRestaurant){
		$stmt = $db->prepare("UPDATE Restaurant SET location=? WHERE idRestaurant=?");
		$stmt->execute(array($location,$idRestaurant));
	}
	function updatePriceR($db, $price, $idRestaurant){
		$stmt = $db->prepare("UPDATE Restaurant SET price=? WHERE idRestaurant=?");
		$stmt->execute(array($price,$idRestaurant));
	}
	
	function updateOpenR($db, $open, $idRestaurant){
		$stmt = $db->prepare("UPDATE Restaurant SET open=? WHERE idRestaurant=?");
		$stmt->execute(array($open,$idRestaurant));
	}
	
	function updateCloseR($db, $close, $idRestaurant){
		$stmt = $db->prepare("UPDATE Restaurant SET end=? WHERE idRestaurant=?");
		$stmt->execute(array($close,$idRestaurant));
	}
	
	function updateDescriptionR($db, $description, $idRestaurant){
		$stmt = $db->prepare("UPDATE Restaurant SET description=? WHERE idRestaurant=?");
		$stmt->execute(array($description,$idRestaurant));
	}
	

	

	
?>	
