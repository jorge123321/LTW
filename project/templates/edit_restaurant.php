<?php
	session_start();
	include_once getcwd() . "/database/connection.php";
	include_once getcwd() . "/database/restaurant.php";
	$result = getRestaurantItem($db, $_GET['id']);
?>
<div id="content">
	<h1> Edit Restaurant</h1>
	<div id="addRestaurant">
		<form id="submit" action="edit_restaurant_action.php" method="post">
		<input type="hidden" name="id_rest" value= <?php echo $_GET['id']; ?> />
			Name:<br>
			<input type="text" name="name" value=<?php echo $result['name']; ?>><br>
			Location:<br>
			<input type="text" name="location" value=<?php echo $result['location']; ?>><br>
			Average Price:<br>
			<input type="text" name="price"><br>
			Category:<br>
			<input type="text" name="category" value=<?php echo $result['category']; ?>><br>
			Opening Hours:<br>
			<input type ="number" name="open" min="0" max="24" step="1"><br>
			Closing Hours:<br>
			<input type ="number" name="close" min="0" max="24" step="1"><br>
			Description:<br>
			<textarea name="description" rows="5" cols="50" placeholder=<?php echo $result['description'] ; ?>>
			</textarea>
			<button type="submit"> Create </button>
		</form>
	</div>
</div>
