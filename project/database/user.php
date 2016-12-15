<?php
	include_once("database/restaurant.php");
	include_once("database/reply.php");
	include_once("database/review.php");

	function deleteUser($db,$idUser) {
 		$restaurants = getRestaurantFromOwner($db,$idUser);
		foreach ($restaurants as $restaurant)
			deleteRestaurant($db,$restaurant['idRestaurant']);
 		$stmt = $db->prepare('DELETE FROM User WHERE idUser = ?');
 		$stmt->execute(array($idUser));
 	}
	
	function getUser($db, $idUser){
		$stmt = $db->prepare('SELECT idUser FROM User WHERE idUser = ?');
		$stmt->execute(array($idUser));
		$result = $stmt->fetchAll();
		return $result;
	}
	function addUser($db, $idUser, $name, $pass, $age, $gender, $photo, $type){
		$stmt = $db->prepare('INSERT INTO User (idUser, name, pass, age,gender, photo,type) VALUES (?,?,?,?,?,?,?)');
		$stmt->execute(array($idUser, $name, $pass, $age, $gender, $photo, $type));
	}
	
	function updateName($db, $name, $idUser){
		$stmt = $db->prepare("UPDATE User SET name=? WHERE idUser=?");
		$stmt->execute(array($name, $idUser));
	}
	function updateAge($db, $age, $idUser){
		$stmt = $db->prepare("UPDATE User SET age=? WHERE idUser=?");
		$stmt->execute(array($age, $idUser));
	}
	function updatePass($db, $pass, $idUser){
		$stmt = $db->prepare("UPDATE User SET pass=? WHERE idUser=?");
		$stmt->execute(array($pass, $idUser));
	}
	function getPass($db, $idUser){
		$stmt = $db->prepare("SELECT pass FROM User WHERE idUser = ?");
		$stmt->execute(array($idUser));
		$result = $stmt->fetch();
		return $result;
	}
?>
