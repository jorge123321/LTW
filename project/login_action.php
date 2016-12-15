<?php
	include_once('database/connection.php');
	$options = ['cost' => 12];	
	$stmt = $db->prepare('SELECT * FROM User WHERE idUser = ?');
  	$stmt->execute(array($_POST['username']));
  	$user = $stmt->fetch();
  	if ($user !== false && password_verify($_POST['pass'], $user['password'])) {
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
