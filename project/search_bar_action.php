<?php
	session_start();
	include_once('database/connection.php');
	include_once('database/restaurant.php');
	include('templates/header.php');
	?>
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
				$search = $_POST['rest_name'];		
				$countResults = 0;
				
				foreach( $result as $row) {
					$rest_name = $row['name'];
					if ( (strpos( strtolower($rest_name) , strtolower($search)) !== false ) 
						&& (strlen(trim($search)) != 0) ){
						$countResults++;
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
				}
				if ($countResults == 0 ){
					?>
					<div id="invalid_par">
					<?php echo '<br><p>No restaurants found/Invalid search parameters.</p>'; ?>
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
<?php
	include('templates/footer.php');
 ?>