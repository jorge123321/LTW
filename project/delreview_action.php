<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/review.php');
	deleteReviewItem($db, $_POST['id']);
	echo '<p>Review Deleted.</p><br>';
?>