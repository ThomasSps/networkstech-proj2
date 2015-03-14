<?php
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	$query = sprintf( "INSERT INTO 'user' ( 'uname', 'pass' ) VALUES ( '%s', '%s' )  ", mysql_real_escape_string( $_POST['uname'] ), mysql_real_escape_string( $_POST['pass'] ) );

	$database -> close(); 
?>