<?php
	session_start();
?>

<div id="content">
	<div id="item">
		<?php

			echo '<h1>' . $_SESSION['idUser'] . '</h1>';
			echo '<h1>' . $result['idOwner'] . '</h1>';
			echo '<h1>' . $result['name'] . '</h1>';
			echo '<p>' . $result['location'] . '</p>';
			echo '<p>' . $result['category'] . '</p>';
			echo '<p>' . $result['open'] . '-' . $result['end'] . '</p>';
			echo '<p>' . $result['description'] . '</p>';
			
			
			if (isset($_SESSION['idUser'])){
				if($_SESSION['type'] == 'reviewer'){
				?>
					<form action="add_review_action.php" method="post">
						<input type="hidden" name="id" value= <?php echo $_GET['id']; ?> />
						<textarea name="comment" rows="5" cols="50"></textarea>
						Score:<input type ="number" name="score" min="0" max="5" step="1"><br>
						<button type="submit"><br><br><br></button>
					</form>
					
					<?php
				}
			}
			
			include_once getcwd() . "/database/connection.php";
			include_once getcwd() . "/database/restaurant.php";
			
			$review = getRestaurantReview($db, $_GET['id']);
			
			foreach($review as $rev){
				echo '<p>From: ' . $rev['idReviewer'] . '</p>';
				echo '<p>Score: ' . $rev['score'] . '</p>';
				echo '<p>Review: ' . $rev['text'] . '</p>';
				
				$reply = getReply($db,$rev['idReview']);
				foreach($reply as $rep){
					echo '<p>From: ' . $rep['idReplyer'] . '</p>';
					echo '<p>Reply: ' . $rep['text'] . '</p>';
				}
					if($_SESSION['idUser'] == $result['idOwner']){
					?>
						<form id="submit" action="add_reply_action.php" method="post">
						<input type="hidden" name="id_review" value= <?php echo $rev['idReview']; ?> />
							Reply:<br>
							<textarea name="reply" rows="5" cols="50">
							</textarea>
							<button type="submit"> Reply </button>
						</form>
					<?php
				}
			}			
		?>
	</div>
</div>