<?php
	session_start();
?>

<div id="content">
	<div id="item">
		<?php

			echo '<h1>' . $result['name'] . '</h1>';
			echo '<p>' . $result['location'] . '</p>';
			echo '<p>' . $result['category'] . '</p>';
			echo '<p>' . $result['open'] . '-' . $result['end'] . '</p>';
			echo '<p>' . $result['description'] . '</p>';
			if (isset($_SESSION['idUser'])){
				if($_SESSION['type'] == 'reviewer'){
				?>
					<form action="add_review_action.php" method="post">
						<textarea id="comment" rows="5" cols="50"></textarea>;
						Score:<input type ="number" name="score" min="0" max="5" step="1"><br>
						<button type="submit"><br><br><br>
					</form>
					
					<?php
				}
			}
			
			include_once getcwd() . "/database/connection.php";
			include_once getcwd() . "/database/restaurant.php";
			
			$result = getRestaurantReview($db, $_GET['id']);
			
			foreach($result as $row){
				echo '<p>' .$row['text']. '</p>';
			}
		?>
	</div>
</div>