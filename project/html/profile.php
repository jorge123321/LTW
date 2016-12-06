<!DOCTYPE html>
<?-- Cerulean #4484CE
	 Aluminium #D9D9D9-->

<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
</head>

<body>
	<?php include('menu.php') ?>
	
	<div id="profilecontainer">
		<img src="../images/background.jpg">
		<div id="infocontainer">
			<form action="./change.php" method="post"> 
				&nbsp;Username: <input class="uinfo" type="text" name="username"></br>
				&nbsp;Name: <input class="uinfo" type="text" name="name"></br>
				&nbsp;Age: <input class="uinfo" type="text" name="age"></br>
				<input id="uinfoupdate" type="submit" value="Update">
			</form>
		</div>
	</div>
	
</body>

</html>