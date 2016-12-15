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
		<input type="hidden" class="uinfo" name="id_rest" value= <?php echo $_GET['id']; ?> />
			Name:<br>
			<input type="text" class="uinfo" name="name" value=<?php echo $result['name']; ?>><br>
			Location:<br>
			<input type="text" class="uinfo" name="location" value=<?php echo $result['location']; ?>><br>
			Average Price:<br>
			<input type="text" class="uinfo" name="price"><br>
			Category:<br>
			<input type="text" class="uinfo" name="category" value=<?php echo $result['category']; ?>><br>
			Opening Hours:<br>
			<input type ="number" class="uinfo" name="open" min="0" max="24" step="1"><br>
			Closing Hours:<br>
			<input type ="number" class="uinfo" name="close" min="0" max="24" step="1"><br>
			Description:<br>
			<textarea name="description" class="uinfo" rows="5" cols="50" placeholder=<?php echo $result['description'] ; ?>>
			</textarea><br>
			<button class="form_button" type="submit"> Create </button>
		</form>
		<form id="submit" action="delrestaurant_action.php" method="post">
		<input type="hidden" name="id" value= <?php echo $_GET['id']; ?> />
		<button type="submit" class="form_button"> Delete </button>
	</div>
</div>
