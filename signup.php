<?php
	require_once 'db_connect.php';

	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
	$extra_1 = 'login.php';
	$extra_2 = 'signup.html'; 

	$gg = 0;

	$database = new DB_Provider();
	$database->connect();

	if( isset($_POST["uname"]) && isset($_POST["pass"]) )
	{
		$query = 'SELECT `uname` FROM `user` WHERE `uname`="' . $_POST['uname'] . '"';
		$result = mysql_query( $query );

		if( !$result ) 
		{
			echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysql_error();
		    exit;
		}
		else 
		{
			if (mysql_num_rows( $result ) == 0) 
			{
				//Clear the query from previous
				$query = "";
				$query = sprintf( "INSERT INTO `user`(`uname`, `pass`) VALUES ( '%s', '%s')", mysql_real_escape_string( $_POST["uname"] ), mysql_real_escape_string( password_hash($_POST["pass"], PASSWORD_DEFAULT) ) );

				$result = mysql_query( $query );

				if (!$result) 
				{
				    echo "DB Error, could not query the database\n";
				    echo 'MySQL Error: ' . mysql_error();
				    exit;
				}
				else 
					$gg++;
			}
		}
	}

	if ($gg) {
		echo 'Thanks for registering , You will be redirected shortly...';	
		echo '<script type ="text/javascript">';
		echo 'setTimeout(function(){ window.location =';
		echo "\"http://" . $host . $uri . "/" . $extra_1 . "\"";
		echo '; }, 2500);';
		echo '</script>';
	}
	else {
		echo 'User already exists. Try again with different user name...';	
		echo '<script type ="text/javascript">';
		echo 'setTimeout(function(){ window.location =';
		echo "\"http://" . $host . $uri . "/" . $extra_2 . "\"";
		echo '; }, 2500);';
		echo '</script>';
	}

	$database->close(); 
?>
