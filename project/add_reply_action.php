<?php
    include ('templates/header.php');    
	include_once('database/connection.php');
	include_once('database/reply.php');
	session_start();
?>
	<div id="content">
<?php
		addReply($_POST['id_review'], $_SESSION['idUser'],$_POST['reply']);
?>
	</div>
<?php
	include ('templates/footer.php');
?>
