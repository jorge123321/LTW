<div id="content">
	<div id = "mainMenu">
			<form id="rsearch" action="search_bar_action.php" method="post"> 
				<input id="srestaurant" name="rest_name" type="text"  placeholder="Search for a restaurant.. " >
			</form>
		<ul>
			<?php
				include_once getcwd() . "/database/connection.php";
				include_once getcwd() . "/database/restaurant.php";
				$result = getAllRestaurant($db);
		
				foreach( $result as $row) {
			?>
				<div id = "rest">
			<?php
					echo '<p><a class="feed" href="restaurant_item.php?id=' . $row['idRestaurant'] . '">' . $row['name']  .  '</a></p>';
					echo '<p>Category:' .$row['category']. ' | Situated on: ' . $row['location'] . '<p>';
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
</div>
