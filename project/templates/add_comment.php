<?php
	session_start();
?>
<div id="content">
	<h1> Make your review</h1>
	
	<div id="addComment">
		<form id="submit" action="add_comment_action.php" method="post">
			Score:<br>
			<input type ="number" name="score" value="required" min="0" max="5" step="1"><br>
			Comment:<br>
			<textarea name="comment" rows="5" cols="50" placeholder="Add a short comment">
			</textarea>
			<button type="submit"> Submit </button>
		</form>
	</div>
</div>
