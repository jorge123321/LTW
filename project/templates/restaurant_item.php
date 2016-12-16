<?php
	session_start();
				include_once getcwd() . "/database/connection.php";
			include_once getcwd() . "/database/restaurant.php";
?>

<div id="content">
	<div id="item">
		<div class="rest" id="restaurant_item_info">
		<?php
		
			echo '<h1> Owner: ' . $result['idOwner'] . '</h1>';
			echo '<h1> Name: ' . $result['name'] . '</h1>';
			echo '<p id="location"> Location : ' . $result['location'] . '</p>';
			echo '<p> Category: ' . $result['category'] . '</p>';
			echo '<p> Working hours: ' . $result['open'] . '-' . $result['end'] . '</p>';
			echo '<p> Description: ' . $result['description'] . '</p>';
			
			$avg = averageScoreRestaurant($db, $_GET['id']);
			if($avg[0] != NULL){
				echo '<p> Average Score: ' .$avg[0]. '</p>';
			}
			else echo'<p> No scores yet </p>';
		?> </div>
		<?php

			if (isset($_SESSION['idUser'])){
				if($_SESSION['type'] == 'reviewer'){
					if(searchReview($db, $_GET['id'], $_SESSION['idUser']) == NULL){
		?>
					<form action="add_review_action.php" class="rest" id="rest_review_form" method="post">
						Write a review:
						<input type="hidden" name="id" value= <?php echo $_GET['id']; ?> />
						<textarea name="comment" rows="1" cols="50" required></textarea>
						<div id="review_score">
						<br>Score:<input type ="number" name="score" min="0" max="5" step="1" required><br>
						</div>
						<div id="review_button_div">
						<button type="submit" class="form_button"><br><br><br></button>
						</div>
					</form>
					
					<?php
					}
				}
			}
						
			$review = getRestaurantReview($db, $_GET['id']);
			?> </br><?php
			foreach($review as $rev){
					?><div id="review" class="rest">
						<div id="review_text">
				<?php
				
				echo '<p>From: ' . $rev['idReviewer'] . '</p>';
				echo '<p>Score: ' . $rev['score'] . '</p>';
				echo '<p>Review: ' . $rev['text'] . '</p>';
				?> </div> <?php
				if($_SESSION['idUser'] == $rev['idReviewer']){
					?>
					<form action="delreview_action.php" id="delete_review"  method="post">
						<input type="hidden" name="id" value= <?php echo $rev['idReview']; ?> />
						<button type="submit"></button>
					</form>
					
					<?php
				}
				$reply = getReply($db,$rev['idReview']);
				foreach($reply as $rep){
					echo '<p>From: ' . $rep['idReplyer'] . '</p>';
					echo '<p>Reply: ' . $rep['text'] . '</p>';
				}
					if($_SESSION['idUser'] == $result['idOwner']){
					?>
						<form id="submit" action="add_reply_action.php" method="post">
						<input type="hidden" name="id_review" value= <?php echo $rev['idReview']; ?> />
						<input type="hidden" name="id_user" value= <?php echo $_SESSION['idUser']; ?> />
							Reply:<br>
							<textarea name="reply" rows="5" cols="50">
							</textarea>
							<button type="submit"> Reply </button>
						</form>
					<?php
				}
				?> </div> <?php
			}			
		?>
		<div id="photos">
			<?php				
				$photos = getPhotos($db, $_GET['id']);
				$i=0;
			if(photos != NULL){
				foreach($photos as $photo){
					echo '<img src="images/' . $result['name'] . '_' .$i. '" width="50px" height="50px">';
					$i++;
				}
			}
			?>
		</div>
		<h3>Check location on google maps here!</h3>
		<div id="map"></div>
	</div>
</div>

<script>
	function initMap() {
		 var latlng = new google.maps.LatLng(41.149, -8.610);
		var mapOptions = {
			zoom: 8,
			center: latlng
		}
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
		var geocoder = new google.maps.Geocoder();
		var address = document.getElementById('location').innerHTML;
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == 'OK') {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location
				});
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}		
		});
		var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: uluru
		});
		var marker = new google.maps.Marker({
		position: uluru,
		map: map
		});
	}
</script>
		<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFyWozOx78ib6pojVTDzr4CDTBHemst38&callback=initMap">
</script>