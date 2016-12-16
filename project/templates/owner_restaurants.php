<div id="content">
		<ul id="owner_restaurants">
			<?php
				include_once getcwd() . "/database/connection.php";
				include_once getcwd() . "/database/restaurant.php";
				$result = getRestaurantFromOwner($db, $_SESSION['idUser']);
			
				foreach( $result as $row) {
			?>
				<div class = "rest">
			<?php				
					echo '<li id="restaurant_name_owner"><a class="feed" href="restaurant_item.php?id=' . $row['idRestaurant'] . '">' . $row['name']  .  '</a></li>';
					echo '<li id="restaurant_edit_owner"><a class="feed" href="edit_restaurant.php?id=' . $row['idRestaurant'] . '"> EDIT</a></li>';
					$photos = getPhotos($db, $row['idRestaurant']);

					if($photos == NULL)
					echo '<img src="images/background" alt="Image" width="150px">';
				else echo '<img src="images/' . $row['name'] . '_0" width="150px" height="150px" >';
			?>
				</div>			
			<?php	
				}
			?>
		</ul>
</div>