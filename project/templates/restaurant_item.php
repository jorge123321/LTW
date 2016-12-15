<?php
	session_start();
?>

<div id="content">
	<div id="item">
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