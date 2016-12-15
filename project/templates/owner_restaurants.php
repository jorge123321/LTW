<div id="content">
		<ul>
			<?php
				include_once getcwd() . "/database/connection.php";
				include_once getcwd() . "/database/restaurant.php";
				$result = getRestaurantFromOwner($db, $_SESSION['idUser']);
			
				foreach( $result as $row) {
					echo '<li><a class="feed" href="restaurant_item.php?id=' . $row['idRestaurant'] . '">' . $row['name']  .  '</a></li>';
					echo '<li><a class="feed" href="edit_restaurant.php?id=' . $row['idRestaurant'] . '"> EDIT </a></li>';
					echo '<img src="images/background" alt="Image" width="150px">';
					
				}
			?>
		</ul>
</div>