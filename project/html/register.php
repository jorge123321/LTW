<!DOCTYPE html>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/register.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
</head>

<body>
	<div id="wrapper">
		<div id="sitename">RReview</div>
		<form id="loginform" action="" method="post">
		<input id="username" type="text"  placeholder="username" required></br>
		<input id="password" type="password" placeholder="password" required></br>
		<input id="name" type="text" placeholder="name" required></br>
		<input id="age" type="text" placeholder="age" required></br></br>
		<div id="userchoice">
			You are a/an:</br>
			<input type="radio" name="usertype" id="choice1" value="Reviewer" checked="checked">
			 <label for="choice1">Reviewer</label></br>
			<input type="radio" name="usertype" id="choice2" value="Owner">
			 <label for="choice2">Owner</label>
		</div></br>
		<input id="loginb" type="submit" value="Register">
		</form>
	</div>
</body>

</html>
