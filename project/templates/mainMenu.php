<div id="content">
	<div id = "mainMenu">
			<form id="rsearch" action="" method="post"> 
				<input id="srestaurant" type="text"  placeholder="Search for a restaurant.. " >
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
					echo '<p>Category:' .$row['category']. ' Situated on: ' . $row['location'] . '<p>';
					echo '<img src="images/background" alt="Image" width="150px">';
			?>
				</div>
			<?php
				}
			?>
		</ul>
	</div>
</div>
	
	<div class="sidebar">
			<h2>Categorias</h2>
			<ul class="toolbar">
				<?php
					include_once getcwd() . "/database/connection.php";
					include_once getcwd() . "/database/restaurant.php";
					$result = getAllCategories($db);
					
					foreach($result as $row) {
						echo '<li> '. $row['category']. '</li>';
					}
				?>
			</ul>
	</div>
