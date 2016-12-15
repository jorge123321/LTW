<?php
	include_once("database/restaurant.php");
	include_once("database/reply.php");
	include_once("database/user.php");
	function searchReview($db, $idRestaurant, $idUser){
		$stmt = $db->prepare('SELECT * FROM RestaurantReview WHERE idReviewer = ? AND idRestaurant=?');
		$stmt->execute(array($idUser, $idRestaurant));
		$result = $stmt->fetch();
		return $result;
	}
	
		function deleteReviewItem($db, $idReview){
		deleteReply($db, $idReview);
		$stmt = $db->prepare('DELETE FROM RestaurantReview WHERE idReview = ?');
		$stmt->execute(array($idReview));	
	}
	
		function deleteReview($db,$idRestaurant) {
		$reviews = getRestaurantReview($db,$idRestaurant);
		foreach ($reviews as $review)
			deleteReply($db,$review['idReview']);
 		$stmt = $db->prepare('DELETE FROM RestaurantReview WHERE idRestaurant = ?');
 		$stmt->execute(array($idRestaurant));
 	}
	
		function getRestaurantReviewItem($db, $idReview){
		$stmt = $db->prepare('SELECT * FROM RestaurantReview WHERE idReview = ?');
		$stmt->execute($idReview);
		$result = $stmt->fetch();
		return $result;
	}
	
		function getRestaurantReview($db, $idRestaurant){
		$stmt = $db->prepare('SELECT * FROM RestaurantReview WHERE idRestaurant = ?');
		$stmt->execute(array($idRestaurant));
		$result = $stmt->fetchAll();
		return $result;
	}
?>
	