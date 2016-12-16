<?php
	include_once('database/connection.php');
	$options = ['cost' => 12];	
	$stmt = $db->prepare('SELECT idUser, name, pass, age, gender, photo, type FROM User WHERE idUser = ?');
  	$stmt->execute(array($_POST['username']));
  	$result = $stmt->fetch();
  	if ($result != null && password_verify($_POST['pass'], $result['pass'])) {
    	session_start();
		$_SESSION['idUser'] = $result['idUser'];
		$_SESSION['name'] = $result['name'];
		$_SESSION['age'] = $result['age'];
		$_SESSION['gender'] = $result['gender'];
		$_SESSION['photo'] = $result['photo'];
		$_SESSION['type'] = $result['type'];
  	}
	else{
		echo 'The user does not exist';
	}
	header("Location: main.php");
	exit();
?>