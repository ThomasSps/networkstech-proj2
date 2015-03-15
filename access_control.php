<?php

	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	session_start();

	// Get username and password from Session or POST

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

		header("location: login.html");
	}

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

			header("location: index.php");

		}
		else {

			// INVALID USER -> LOGIN TODO: MESSAGE WRONG PASS
			unset($_SESSION['uname']);
			unset($_SESSION['pass']);

			header("location: login.php");
		}
	}
	else {

		// NO USER -> LOGIN  TODO: MESSAGE WRONG USER

		unset($_SESSION['uname']);
		unset($_SESSION['pass']);

		header("location: login.php");


	}

?>