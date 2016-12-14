<?php
	session_start();
?>
<div id="content">
	<h1> Make your own Restaurant</h1>

		<form id="submit" action="advanced_search_action.php" method="post">
			Name:<br>
			<input type="text" name="name" value="required"><br>
			Location:<br>
			<input type="text" name="location" value="required"><br>
			Average Price:<br>
			<input type="text" name="price" value="required"><br>
			Category:<br>
			<?php
				include_once getcwd() . "/database/connection.php";
				include_once getcwd() . "/database/restaurant.php";
			
				$result = getAllCategories($db);
				
				foreach($result as $row){
					echo '<input type="radio">' .$row['category']. '<br>';
				}
			?>
			Opening Hours:<br>
			<input type ="number" name="open" min="0" max="24" step="1"><br>
			Closing Hours:<br>
			<input type ="number" name="close" min="0" max="24" step="1"><br>
			<button type="submit"> Search </button>
		</form>
</div>