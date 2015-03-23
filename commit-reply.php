<?php
	require_once 'db_connect.php';
	
	session_start( );
	
	$database = new DB_Provider();
	$database->connect();
	
	//TODO: take uname from $_GET request too :D
	$uname = mysql_real_escape_string( $_SESSION['uname'] );
	
	//Get the user id
	$query = 'SELECT `id` FROM `user` WHERE `uname`="' . $uname . '"';
	$result = mysql_query( $query );
	
	if( mysql_num_rows($result) == 1 )
	{
		$row = mysql_fetch_assoc($result);
		$uid = $row['id'];
	}
	else
	{
		echo "DB Error, could not query the database\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	
	$text = $_POST['reply'];
	$ans_to = $_POST['comment_id'];
	
	$query = 'INSERT INTO `reply`(`u_id`, `comment_id`, `text`) VALUES ('. $uid . ','. $ans_to . ',"' . "TSAFA" . '")';
	$result = mysql_query ($query);
	
	$database->close();
?>