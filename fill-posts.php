<?php
	require_once 'db_connect.php';
	require_once 'find-likes.php';
    require_once 'delete.php';

	$database = new DB_Provider();
	$database->connect();

    session_start();
    
    $query = "SELECT * FROM `post` ORDER BY `date` DESC";
	$result = mysql_query( $query );

	if( !$result )
	{
		echo "DB Error, could not query the database\n";
	    echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	else if( mysql_num_rows($result) == 0 )
		echo "<h2>No posts found to show, come back later</h2>";
	else
	{
		while ($row = mysql_fetch_array($result))
		{
			//Get post id
            $id_query = 'SELECT id FROM `post` WHERE `id`= "' . $row['id'] . '"';
            $id_result = mysql_query( $id_query );
			$id_row = mysql_fetch_assoc( $id_result );
			$post_id = $id_row['id'];
			
			//Fetch username of the id
            $alt_query = 'SELECT `uname` FROM `user` WHERE `id`="' . $row['u_id'] . '"';
			$alt_result = mysql_query($alt_query);
			$alt_row = mysql_fetch_assoc($alt_result);
			$usr_name = $alt_row['uname'];
			
			//Print the posts of the blog
			echo "<post>";
			echo "<dt>" . $row['title'] ."&nbsp;&nbsp;<i>?<a href='user-profile.php?uname=" . $usr_name . "'>". $usr_name . "</a>&nbsp;&nbsp;@" .  substr($row['date'], 0, strlen($row['date'])-3); 
           
            if (check($usr_name, $_SESSION['uname']) == 1)
                echo '</i><button type="button" id="delete" onclick=\'DeletePost("' . $post_id . '");\'><img src="img/delete.png" width="15px" height="15px"><img/></button>';
            else
                echo "</i>"; 

			if ($_SESSION['clicked'] == $post_id)
                echo '<div class="selected" id="sec' . $post_id . '" style="display: block; float: right;"> &gt; </div></dt>';
            else
                echo '<div class="selected" id="sec' . $post_id . '" style="display: none; float: right;"> &gt; </div></dt>';
			
            echo '<div id="like">';
			echo '<img id="ribon" src="img/ribon.png" width="35px" height="45px"/>';

			if (getPostLikes($row['id']) < 10)
				echo '<p class="like_counter" id="'. $row['id'] . '"> &nbsp;&nbsp;' . getPostLikes($row['id']) . '</p>';
			else if (getPostLikes($row['id']) < 100)
				echo '<p class="like_counter" id="'. $row['id'] . '"> &nbsp;' . getPostLikes($row['id']) . '</p>';
			else
				echo '<p class="like_counter" id="'. $row['id'] . '">' . getPostLikes($row['id']) . '</p>';
			
			echo '<p id="plus_one" onclick="addLike(' . $row['id'] . ')">+1</p>';
			echo '</div>';
			echo '<dd onclick="displaySelected(' . $row['id'] . ');">' . $row['text'] . '</dd>';
			echo "</post>";
		}
	}
	$database->close();
?>
