<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	session_start();
?>
	<div id="content">
<?php
		$stmt = $db->prepare('INSERT INTO Reply (idReply, idReview, idReplyer, text) VALUES (NULL,?,?,?)');
		$stmt->execute(array($_POST['id_review'], $_SESSION['idUser'],$_POST['reply']));
		
		echo '<p>The restaurant was created sucessfully!</p>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
