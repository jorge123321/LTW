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
					echo '<img id="restaurant_image_owner" src="images/background" alt="Image" width="150px">';
			?>
				</div>			
			<?php	
				}
			?>
		</ul>
</div>