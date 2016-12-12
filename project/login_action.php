<?php
	include_once('database/connection.php');
	$stmt = $db->prepare('SELECT idUser, name, pass, age, gender, photo, type FROM User WHERE idUser = ? AND pass = ?');
	$stmt->execute(array($_POST['username'],sha1($_POST['pass'])));
	$result = $stmt->fetch();
	if ($result != null){
		session_start();
		$_SESSION['idUser'] = $result['idUser'];
		$_SESSION['name'] = $result['name'];
		$_SESSION['age'] = $result['age'];
		$_SESSION['gender'] = $result['gender'];
		$_SESSION['photo'] = $result['photo'];
		$_SESSION['type'] = $result['type'];
	}else{
		echo 'The user does not exist';
	}
	header("Location: main.php");
	exit();
?>