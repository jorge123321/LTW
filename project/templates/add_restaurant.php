<div id="content">
	<h1> Make your own Restaurant</h1>
	
	<div id="addRestaurant">
		<form id="submit" action="add_restaurant_action.php" method="post">
			Name:<br>
			<input type="text" name="name" value="required"><br>
			Location:<br>
			<input type="text" name="location" value="required"><br>
			Average Price:<br>
			<input type="text" name="price" value="required"><br>
			Category:<br>
			<input type="text" name="category" value="required"><br>
			Opening Hours:<br>
			<input type ="number" name="close" min="0" max="24" step="1"><br>
			Closing Hours:<br>
			<input type ="number" name="close" min="0" max="24" step="1"><br>
			Description:<br>
			<textarea rows="5" cols="50" placeholder="Add a short description">
			</textarea>
			<button type="submit"> Create </button>
		</form>
	</div>
</div>
