<?php
	require_once 'db_connect.php';
	require_once 'find-likes.php';

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
			echo "<dt>" . $row['title'] ."&nbsp;&nbsp;<i>?<a href='user-profile.php?uname=" . $usr_name . "'>". $usr_name . "<a>&nbsp;&nbsp;@" .  substr($row['date'], 0, strlen($row['date'])-3). "</i></dt>";
			echo '<div id="like">';
			echo '<img id="ribon" src="img/ribon.png" width="30px" height="45px"/>';
			echo '<p class="like_counter" id="'. $row['id'] . '">' . getPostLikes($row['id']) . '</p>';
			echo '<p id="plus_one" onclick="addLike(' . $row['id'] . ')">+1</p>';
			echo '</div>';
			echo '<dd onclick="displaySelected(' . $row['id'] . ');">' . $row['text'] . '</dd>';
			echo "</post>";
		}
	}

	$database -> close( );
?>
