<?php

	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	session_start();

	$id = $_POST["postid"];

	$query = "SELECT * FROM `comment` WHERE `p_id` = '" . $id . "'";
	$result = mysql_query( $query );

	$_SESSION['clicked'] = $id;

	if( !$result )
	{
		echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	else if( mysql_num_rows($result) == 0 )
	{
		if (isset($_SESSION['clicked']) )
			echo "<h2>No comments found to show. Be the first to comment :)</h2>";
		else
			echo "<h2>Click on a post to display comments.</h2>";
	}
	else
	{
		$alt_query = 'SELECT `id`, `u_id`, `p_id`, `date`, `text` FROM `comment` WHERE 	`p_id` = ' . $id ;
		$alt_result = mysql_query( $alt_query );

		while( $row = mysql_fetch_assoc( $alt_result ))
		{
			//TODO: Create JSON String with comments
			echo $row['text'] . " ";

		}
	}

	$database -> close( );


?>
