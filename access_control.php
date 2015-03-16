<?php
	error_reporting(0);

	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	session_start();

	$user = isset($_POST['uname']) ? $_POST['uname'] : $_SESSION['uname'];
	$pass = isset($_POST['pass']) ? $_POST['pass'] : $_SESSION['pass'];

	$_SESSION['uname'] = $user;
	$_SESSION['pass'] = $pass;



	// AUTHENTICATE USER

	$query = "SELECT * FROM `user` WHERE `uname` = '$user'";

	$result = mysql_query($query);

	$count = mysql_num_rows($result);

	if ( $count == 1 ){

		$row = mysql_fetch_assoc($result);

		if ( password_verify( $pass, $row['pass']) ){

			// VALID USER -> INDEX

			//Redirect from login.php -> index.php
			if( basename($_SERVER['PHP_SELF']) == "login.php" )
				header('Location: index.php');
			//exit;
		}
		else {

			// INVALID PASSWORD -> LOGIN 
			unset($_SESSION['uname']);
			unset($_SESSION['pass']);
			$_SESSION['Error'] = "Wrong Username or Password";

			if( basename($_SERVER['PHP_SELF']) != "login.php" )
				
				header("Location:  login.php");
		}
	}
	else {
		//NO USER FOUND -> LOGIN  
		unset($_SESSION['uname']);
		unset($_SESSION['pass']);
		
		if( basename($_SERVER['PHP_SELF']) != "login.php" )
			header("Location:  login.php");
	}

?>