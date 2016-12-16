<?php
	session_start();
    include ('templates/header.php');    
	include_once('database/connection.php');
	include_once('database/reply.php');

?>
	<div id="content">
<?php
		addReply($db,$_POST['id_review'], $_POST['id_user'],$_POST['reply']);
		echo '<p>Reply Successful.</p><br>';
?>
	</div>
<?php
	include ('templates/footer.php');
?>
