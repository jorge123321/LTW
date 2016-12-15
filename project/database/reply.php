<?php
	include_once("database/restaurant.php");
	include_once("database/review.php");
	include_once("database/user.php");
	
	function addReply($db, $idReview, $idUser, $reply){
		$stmt = $db->prepare('INSERT INTO Reply (idReply, idReview, idReplyer, text) VALUES (NULL,?,?,?)');
		$stmt->execute(array($idReview, $idUser, $reply));
	}
	
	function getReply($db, $idReview){
		$stmt = $db->prepare('SELECT * FROM Reply WHERE idReview = ?');
		$stmt->execute(array($idReview));
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function deleteReply($db,$idReview) {
 		$stmt = $db->prepare('DELETE FROM Reply WHERE idReview = ?');
 		$stmt->execute(array($idReview));
 	}
	
?>