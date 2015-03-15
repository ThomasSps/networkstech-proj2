<?php
	error_reporting(0);
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	session_start();

	// Get username and password from Session or POST

	/*
	if ( isset($_POST['uname']) ){

		$user = $_POST['uname'];

	}
	else {

		$user = $_SESSION['uname'];
	}

	if ( isset($_POST['pass']) ){

		$pass = $_POST['pass'];
	}
	else {

		$pass = $_SESSION['pass'];
	}

	if ( !isset($user) ){

		$page = $_SERVER['PHP_SELF'];
		$sec = "10";
		header("Refresh:  url=$page");
		exit;
	} */

	$user = isset($_POST['uname']) ? $_POST['uname'] : $_SESSION['uname'];
	$pass = isset($_POST['pass']) ? $_POST['pass'] : $_SESSION['pass'];

	$_SESSION['uname'] = $user;
	$_SESSION['pass'] = $pass;



	// AUTHENTICATE USER

	$query = "SELECT * FROM `user` WHERE `uname` = '$user'";

	$result = mysql_query($query);

	$count = mysql_num_rows($result);

	if ( $count == 1){

		$row = mysql_fetch_assoc($result);

		if ( password_verify( $pass, $row['pass']) ){

			// VALID USER -> INDEX

			header('Location: index.php');
			exit;

		}
		else {

			// INVALID USER -> LOGIN TODO: MESSAGE WRONG PASS
			unset($_SESSION['uname']);
			unset($_SESSION['pass']);

			$page = $_SERVER['PHP_SELF'];
			$sec = "10";
			header("Refresh:  url=$page");
			exit;
		}
	}
	else {

		// NO USER -> LOGIN  TODO: MESSAGE WRONG USER

		/*
		 
		TO DELETE COOKIE


		if (ini_get("session.use_cookies")) {
    		$params = session_get_cookie_params();
    		setcookie(session_name(), '', time() - 42000,
        	$params["path"], $params["domain"],
        	$params["secure"], $params["httponly"]
    		);
		}	

		session_destroy(); */

		unset($_SESSION['uname']);
		unset($_SESSION['pass']);
		
		$page = $_SERVER['PHP_SELF'];
		$sec = "10";
		header("Refresh:  url=$page");


	}

?>