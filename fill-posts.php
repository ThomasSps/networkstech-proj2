<?php
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	$query = "SELECT * FROM `post` ORDER BY `date` DESC";
	$result = mysql_query( $query );

	if( !$result )
	{
		echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	else if( mysql_num_rows($result) == 0 )
	{
		echo "<h2>No posts found to show, come back later</h2>";
	}
	else
	{
		while( $row = mysql_fetch_array($result) )
		{
			$alt_query = 'SELECT `uname` FROM `user` WHERE `id`="' . $row['u_id'] . '"';
			$alt_result = mysql_query( $alt_query );
			$alt_row = mysql_fetch_assoc( $alt_result );
			$usr_name = $alt_row['uname'];
			echo "<post>";
			echo "<dt>" . $row['title'] ."&nbsp;&nbsp;?" . $usr_name . "&nbsp;&nbsp;@" .  substr($row['date'], 0, strlen($row['date'])-3). "</dt>";
			echo '<dd onclick="displaySelected(' . $row['id'] . ');">' . $row['text'] . '</dd>';
			echo "</post>";
		}
	}

	$database -> close( );
?>
