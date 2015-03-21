<?php include 'access_control.php';?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Asanz - Login</title>
  <script src="js/validateLogIn.js"></script>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="wrap">
		<div class="avatar">
      	<img src="img/login/avatar.png">
		</div>
		<form  name="LogInForm" onsubmit="return validateLogIn()" action="login.php" method = "POST">
			<input name = "uname" type="text" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" autocomplete = off>
			<div class="bar">
			<i></i>
			</div>
			<input name = "pass" type="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" autocomplete = off>
			<br>
			<button type = "submit">Log in</button>
		</form>
		<button onclick="location.href = 'signup.html';">Not a member? Sign up!</button>
		<div id="error" style="color:#CC0000" align='center'>
			<?php 
				if ($_SESSION['Error'] == 1){
					echo "Wrong Username or Password";
					$_SESSION['Error'] = 0; 
				}
			?>
		</div> 
	</div>
</body>
</html>