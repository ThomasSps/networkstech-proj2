<?php
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	$query = sprintf( "INSERT INTO 'user' ( '%s', '%s' )", mysql_real_escape_string( isset($_POST["uname"]) ), mysql_real_escape_string( isset($_POST["pass"]) ) );

	mysql_query( $query );

	$database -> close(); 
?>