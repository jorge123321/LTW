<div id="content">
	<h1> Make your own Restaurant</h1>
	
	<div id="signupForm">
		<form id="submit" action="signup_action.php" method="post">
			Username:<br>
			<input type="text" name="username" value="required"><br>
			Name:<br>
			<input type="text" name="name" value="required"><br>
			Pass:<br>
			<input type="password" name="pass" value="required"><br>
			Age:<br>
			<input type="number" name="age" value="25" min="18" max="90" step="1"><br>
			Gender:<br>
			<div>
				<input type="radio" name="gender" value="male">Male
				<input type="radio" name="gender" value="female">Female<br>
			</div>
			Photo:<br>
			<input type="text" name="photo" value="required">
			Type:<br>
			<div>
				<input type="radio" name="type" value="reviewer">Reviewer
				<input type="radio" name="type" value="owner">Owner<br>
			</div>
			<button type="submit"> Register </button>
			
		</form>
	</div>
</div>