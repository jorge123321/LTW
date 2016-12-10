<?php
	function getAllRestaurant($db){
		$stmt = $db->prepare('SELECT * FROM Restaurant');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	function getRestaurantItem($db, $id){
		$stmt = $db->prepare('SELECT * FROM Restaurant WHERE idRestaurant = ?');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	function getRestaurantFromOwner($db, $owner){
		$stmt = $db->prepare('SELECT * FROM Restaurant WHERE idOwner = ?');
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
?>	