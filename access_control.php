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

			// INVALID PASSWORD -> LOGIN TODO: MESSAGE WRONG PASS
			unset($_SESSION['uname']);
			unset($_SESSION['pass']);

			if( basename($_SERVER['PHP_SELF']) != "login.php" )
				header("Location:  login.php");
		}
	}
	else {
		//NO USER FOUND -> LOGIN  TODO: MESSAGE WRONG USER
		unset($_SESSION['uname']);
		unset($_SESSION['pass']);

		if (ini_get("session.use_cookies")) {
	    		
	    		$params = session_get_cookie_params();
	    		setcookie(session_name(), '', time() - 42000,
	        	$params["path"], $params["domain"],
	        	$params["secure"], $params["httponly"]
	    		);
		}	
		session_destroy();

		if( basename($_SERVER['PHP_SELF']) != "login.php" )
			header("Location:  login.php");
	}

?>