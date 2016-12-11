<div id="content">
		<h2>Change your profile</h2>
		<div id="infocontainer">
			<h2><?php echo $_SESSION['username'] ?>
			<form action="" method="post">
				Name:
				<input type="text" name="name" placeholder=<?php echo $_SESSION['name'] ?>><br>
				Password:
				<input type="text" name="pass" value="required"><br>
				Age:
				<input type="text" name="age" placeholder=<?php echo $_SESSION['age'] ?>><br>
				<input id="uinfoupdate" type="submit" value="Update">
			</form>
		</div>
	</div>
	
</body>

</html>