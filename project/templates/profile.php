<div id="content">
		<h2>Modify your profile.</h2>
		<div id="signupForm">
			<h2><?php echo $_SESSION['username'] ?></h2>
			<form id="submit" action="profile_action.php" method="post">
				Name:<br>
				<input type="text" class="uinfo" name="name" value=<?php echo $_SESSION['name'] ?>><br>
				Age:<br>
				<input type="text" class="uinfo" name="age" value=<?php echo $_SESSION['age'] ?>><br>
				Current password:<br>
				<input type="password"  class="uinfo" name="cpass" value=""><br>
				New password:<br>
				<input type="password"  class="uinfo" name="npass" value=""><br>
				Confirm new password:<br>
				<input type="password"  class="uinfo" name="npass2" value=""><br>
				<input class="form_button" type="submit" name="update" value="Update">
				<input class="form_button" type="submit" name="delete" value="Delete Account" />
			</form>	
		</div>
	</div>
	