<?php
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	if( $database->selectDB() )
	{
	 	$alt_query = "DROP DATABASE `asanz`";
	 	mysql_query( $alt_query );
	}

 	$path = $_SERVER['DOCUMENT_ROOT'];
	$sql_filename = 'sql/asanz.sql';

	$sql_contents = file_get_contents($sql_filename);
	$sql_contents = explode(";", $sql_contents);
	     
	foreach($sql_contents as $query) 
	{
		$result = mysql_query($query);
	        
        if (!$result && $query=="")
            echo "Error on import of ".$query;
	}

	//Display win page
	echo '<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="UTF-8">
			  <title>Asanz - Install</title>
			  <script src="js/validateLogIn.js"></script>
			  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
			  <link rel="stylesheet" href="css/after-install.css">
			  <link rel="stylesheet" href="css/animations.css">
			</head>';

	echo '
	<body>
  <div class="wrap">
		<div class="avatar fadeIn">
      	<img src="img/login/avatar.png">
		</div>
		<form  name="LogInForm" onsubmit="return validateLogIn()" action="login.php" method = "POST">
			<input class="slideLeft" readonly id="first" name = "first" type="text" value="Created database..." autocomplete = off>
			<div class="bar">
			<i></i>
			</div>
			<input class="slideRight" readonly id="second" name="second" type="text" value="Created tables..."  autocomplete = off>
			<div class="bar">
			<i></i>
			</div>
			<input class="slideLeft" readonly id="third" name="third" type="text" value="All set!"  autocomplete = off>
			<br>
			<button class="bigEntrance" type = "submit">Nice!</button>
		</form>
	</div>
</body>'

?>