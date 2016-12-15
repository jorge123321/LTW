<?php
	session_start();
	include ('templates/header.php');  
	include_once('database/connection.php');
	include_once('database/user.php');
	
	
	?>
	<div id="content">
	<?php
	if (isset($_POST['update'])) {
	
	if ($_SESSION['name'] != $_POST['name']){
		updateName($db, $_POST['name'],$_SESSION['idUser']);
		$_SESSION['name'] = $_POST['name'];
		echo '<p>Name changed.</p><br>';
	}
	
	if ($_SESSION['age'] != $_POST['age']){
		updateAge($db, $_POST['age'],$_SESSION['idUser']);
		$_SESSION['age'] = $_POST['age'];
		echo '<p>Age changed.</p><br>';
	}
	
	if ( ( $_POST['cpass'] && $_POST['npass'] && $_POST['npass2']  ) != ""){
		$result = getPass($db, $_SESSION['idUser']);
		
		if (($_POST['npass'] == $_POST['npass2']) && (sha1($_POST['cpass']) == $result['pass']) )
		{
			updatePass($db, sha1($_POST['npass']),$_SESSION['idUser']);
			echo '<p>Password changed successfully.</p><br>';
		}
		else{
			echo '<p>Incorrect current password/ New password does not match. </p><br>';
		}
	}	
	} else if (isset($_POST['delete'])) {
			deleteUser($db,$_SESSION['idUser']);
			header("Location: logout_action.php");
	}
?>
	</div>
<?php
	include ('templates/footer.php');
?>
