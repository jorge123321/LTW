<?php
	session_start();
?>
<div id="content">
	<h1> Make your own Restaurant</h1>
	
	<div id="addRestaurant">
		<form id="submit" action="add_restaurant_action.php" method="post" enctype="multipart/form-data">
			Name:<br>
			<input type="text"  class="uinfo" name="name" required><br>
			Location:<br>
			<input type="text" class="uinfo" name="location" required><br>
			Average Price:<br>
			<input type="text" class="uinfo" name="price" required><br>
			Category:<br>
			<input type="text" class="uinfo" name="category" required><br>
			Opening Hours:<br>
			<input type ="number" class="uinfo" name="open" min="0" max="24" step="1" required><br>
			Closing Hours:<br>
			<input type ="number" class="uinfo" name="close" min="0" max="24" step="1" required><br>
			Description:<br>
			<textarea name="description" class="uinfo" rows="5" cols="50" required>
			</textarea><br>
			Add Image:<br>
			<input type="file" name="image[]" multiple="multiple"> <br>
			<br><button class="form_button" type="submit"> Create </button>
		</form>
	</div>
</div>
