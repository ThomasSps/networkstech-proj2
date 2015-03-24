<?php
	require_once 'db_connect.php';

	session_start( );

	$database = new DB_Provider();
	$database -> connect();

	$query = 'DELETE FROM reply WHERE id = '. $_POST['replyid'] .'';
	$result = mysql_query( $query );

	$database->close();
?>
