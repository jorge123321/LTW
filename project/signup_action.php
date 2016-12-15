<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	include_once('database/user.php');
	
	$result = getUser($db, $_POST['username']);
?>
	<div id="content">
<?php
	if ($result == null){
		addUser($db,$_POST['username'],$_POST['name'],sha1($_POST['pass']),$_POST['age'], $_POST['gender'],$_POST['photo'],$_POST['type']);
		echo '<p>The user was created sucessfully!</p>';
	}else{
		echo '<p>Could not sign up because the user already exists!</p>';
	}
?>
	</div>
<?php
	include ('templates/footer.php');
?>
