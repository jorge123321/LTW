<div id="content">
		<h2>Change your profile</h2>
		<div id="infocontainer">
			<h2><?php echo $_SESSION['username'] ?>
			<form action="profile_action.php" method="post">
				Name:
				<input type="text" name="name" value=<?php echo $_SESSION['name'] ?>><br>
				Age:
				<input type="text" name="age" value=<?php echo $_SESSION['age'] ?>><br>
				Current password:
				<input type="text" name="cpass" value=""><br>
				New password:
				<input type="text" name="npass" value=""><br>
				Confirm new password:
				<input type="text" name="npass2" value=""><br>
				<input id="uinfoupdate" type="submit" name="update" value="Update">
				<input id="uinfoupdate" type="submit" name="delete" value="Delete Account" />
			</form>
		</div>
	</div>
	
</body>

</html>