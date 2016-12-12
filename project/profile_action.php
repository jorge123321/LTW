<?php
	session_start();
	include_once('database/connection.php');
	
	if ($_SESSION['name'] != $_POST['name']){
		$stmt = $db->prepare("UPDATE User SET name=? WHERE idUser=?");
		$stmt->execute(array($_POST['name'],$_SESSION['idUser']));
		$_SESSION['name'] = $_POST['name'];
	}
	
	if ($_SESSION['age'] != $_POST['age']){
		$stmt = $db->prepare("UPDATE User SET age=? WHERE idUser=?");
		$stmt->execute(array($_POST['age'],$_SESSION['idUser']));
		$_SESSION['age'] = $_POST['age'];
	}
	
	if ( ( $_POST['cpass'] && $_POST['npass'] && $_POST['npass2']  ) != ""){
		$stmt = $db->prepare("SELECT pass FROM User WHERE idUser = ?");
		$stmt->execute($_SESSION['idUser']);
		$result = $stmt->fetch();
		
		if (($_POST['npass'] == $_POST['npass2']) && (sha1($_POST['cpass']) == $result['pass']))
		{
			$stmt = $db->prepare("UPDATE User SET pass=? WHERE idUser=?");
			$stmt->execute(array(sha1($_POST['npass']),$_SESSION['idUser']));
		}
		
	}
	header("Location: profile.php");
	exit();

?>