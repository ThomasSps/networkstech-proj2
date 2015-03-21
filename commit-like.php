<?php 
	require_once 'db_connect.php';
	require_once 'find-likes.php';

	$database = new DB_Provider();
	$database -> connect();

	session_start( );

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

	$testquery = 'SELECT `p_id`, `u_id` FROM `post_like` WHERE ( `p_id`="' . $_POST['liketo'] . '" AND `u_id`="' . $uid . '")';
	$testresult = mysql_query($testquery);

	if (mysql_num_rows($testresult) == 1){

		$delete_query = 'DELETE FROM `post_like` WHERE `p_id` ="'. $_POST['liketo'] . '" AND `u_id` ="' . $uid . '"';
		$d_result = mysql_query($delete_query);

		if( !$d_result )
		{
			echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysql_error();
			exit;
		}

	}
	else {

		$query = 'INSERT INTO `post_like`(`p_id`, `u_id`) VALUES (' . $_POST['liketo'] . ',' . $uid . ')';
		$result = mysql_query($query);

		if( !$result )
		{
			echo "DB Error, could not query the database\n";
		    echo 'MySQL Error: ' . mysql_error();
			exit;
		}
	}
	
	echo getPostLikes( $_POST['liketo'] );
	$database -> close();
?>