<?php
	function getAllRestaurant($db){
		$stmt = $db->prepare('SELECT * FROM Restaurant');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
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
	
	function getAllCategories($db){
		$stmt = $db->prepare('SELECT category FROM Restaurant GROUP BY category');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function getRestaurantReview($db, $idRestaurant){
		$stmt = $db->prepare('SELECT * FROM RestaurantReview WHERE idRestaurant = ?');
		$stmt->execute(array($idRestaurant));
		$result = $stmt->fetchAll();
		return $result;
	}
?>	