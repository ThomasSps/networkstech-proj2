<?php
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();


	if( isset($_POST["uname"]) && $_POST["pass"] )
	{
		$query = sprintf( "INSERT INTO `user`(`uname`, `pass`) VALUES ( '%s', '%s')", mysql_real_escape_string( $_POST["uname"] ), mysql_real_escape_string( password_hash($_POST["pass"], PASSWORD_DEFAULT) ) );

		$result = mysql_query( $query );

		if (!$result) {
		    echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysql_error();
		    exit;
		}
	}
	else
		return false;

	$database -> close(); 
?>