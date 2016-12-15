<div id="content">
		<h1> Make an account.</h1>
		<div id="signupForm">
			<form id="submit" action="signup_action.php" method="post">
				Username:
				<input type="text" class="uinfo" name="username" required><br>
				Name:
				<input type="text" class="uinfo" name="name" required><br>
				Pass:
				<input type="password" class="uinfo" name="pass" required><br>
				Age:
				<input type="number" name="age" value="25" min="18" max="90" step="1" required><br>
				<div class="checkbox">
					Gender:<br>
					<input type="radio" name="gender" value="male" checked="true">Male
					<input type="radio" name="gender" value="female">Female<br>
				</div>
				<br>
				<input type="text" name="photo" value="required" style="display:none">
				<div class="checkbox">
					Type:<br>
					<input type="radio" name="type" value="reviewer" checked="true">Reviewer
					<input type="radio" name="type" value="owner">Owner<br>
				</div>
				<br>
				</div><br>
				<button type="submit" class="form_button"> Register </button>
			</form>
</div>