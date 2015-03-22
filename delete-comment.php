<?php
	require_once 'db_connect.php';

	session_start( );

	$database = new DB_Provider();
	$database -> connect();

	$query = 'DELETE FROM comment WHERE id = '. $_POST['commid'] .'';
	$result = mysql_query( $query );

	header('Location: index.php');

	$database->close();
?>
