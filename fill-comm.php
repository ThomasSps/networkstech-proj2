<?php

	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();


	$id = $_GET["postid"];

	$query = "SELECT * FROM `comment` WHERE `p_id` = '" . $id . "'";
	$result = mysql_query( $query );

	if( !$result )
	{
		echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	else if( mysql_num_rows($result) == 0 )
	{
		echo "<h2>No comments found to show. Be the first to comment :)</h2>";
	}
	else
	{
		while( $row = mysql_fetch_array($result) )
		{
			$alt_query = 'SELECT `uname` FROM `user` WHERE `id`="' . $row['u_id'] . '"';
			$alt_result = mysql_query( $alt_query );
			$alt_row = mysql_fetch_assoc( $alt_result );
			$usr_name = $alt_row['uname'];

			// TO DO: Show comments!!





		}




	}

	$database -> close( );



?>
