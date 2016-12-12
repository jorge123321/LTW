<?php
	session_start();
	include ('templates/header.php');  
	include_once('database/connection.php');
	
	?>
	<div id="content">
	<?php
	if ($_SESSION['name'] != $_POST['name']){
		$stmt = $db->prepare("UPDATE User SET name=? WHERE idUser=?");
		$stmt->execute(array($_POST['name'],$_SESSION['idUser']));
		$_SESSION['name'] = $_POST['name'];
		echo '<p>Name changed.</p><br>';
	}
	
	if ($_SESSION['age'] != $_POST['age']){
		$stmt = $db->prepare("UPDATE User SET age=? WHERE idUser=?");
		$stmt->execute(array($_POST['age'],$_SESSION['idUser']));
		$_SESSION['age'] = $_POST['age'];
		echo '<p>Age changed.</p><br>';
	}
	
	if ( ( $_POST['cpass'] && $_POST['npass'] && $_POST['npass2']  ) != ""){
		$stmt = $db->prepare("SELECT pass FROM User WHERE idUser = ?");
		$stmt->execute(array($_SESSION['idUser']));
		echo '<p>'.$_SESSION['idUser'].'</p><br>';
		$result = $stmt->fetch();
		echo '<p>'.$result['pass'].'</p><br>';
		if (($_POST['npass'] == $_POST['npass2']) && (sha1($_POST['cpass']) == $result['pass']) )
		{
			$stmt = $db->prepare("UPDATE User SET pass=? WHERE idUser=?");
			$stmt->execute(array(sha1($_POST['npass']),$_SESSION['idUser']));
			echo '<p>Password changed successfully.</p><br>';
		}
		else{
			echo '<p>Incorrect current password/ New password does not match. </p><br>';
		}
	}	
?>
	</div>
<?php
	include ('templates/footer.php');
?>