<script type="text/javascript" src="js/delete_post_comm.js"></script>
<?php

	require_once 'db_connect.php';
    require_once 'delete.php';

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
            $id_query = 'SELECT id FROM `comment` WHERE `id`= "' . $row['id'] . '"';
            $id_result = mysql_query( $id_query );
			$id_row = mysql_fetch_assoc( $id_result );
			$comm_id = $id_row['id'];
            
			$myquery = 'SELECT `uname` FROM `user` WHERE `id` = ' . $row['u_id'];
			$myresult = mysql_query($myquery);
			$name = mysql_fetch_assoc($myresult);
			$myid = $row['id'];
			
            $c_query = 'SELECT user.uname AS pname FROM `user` INNER JOIN `post` ON user.id = post.u_id WHERE post.id = "' . $id . '"' ; 
            $c_result = mysql_query( $c_query );
			$c_row = mysql_fetch_assoc( $c_result );
			$c_name = $c_row['pname'];
			
			echo "<comment>";
			echo "<dt>" ."?<a href='user-profile.php?uname=" . $name['uname'] . "'>". $name['uname'] . "<a>&nbsp;&nbsp;@" .  substr($row['date'], 0, strlen($row['date'])-3);
            
            if (check($name['uname'], $_SESSION['uname']) == 1){
                echo '<button type="button" id="delete" onclick=\'DeleteComm("' . $comm_id . '");\'><img src="img/delete.png" width="20px" height="20px"></button>' . "<a onclick='add_reply(". $myid . ");' style='cursor: pointer; text-align:right; margin-top: 5px; float: right; font-size: 15px;'>" . "[Reply]" . "</a></dt>";
            }
            
            elseif (check($c_name, $_SESSION['uname']) == 1){
                echo '<button type="button" id="delete" onclick=\'DeleteComm("' . $comm_id . '");\'><img src="img/delete.png" width="20px" height="20px"></button>' . "<a onclick='add_reply(". $myid . ");' style='cursor: pointer; text-align:right; margin-top: 5px; float: right; font-size: 15px;'>" . "[Reply]" . "</a></dt>";
            }
            
            else {
                echo "<a onclick='add_reply(". $myid . ");' style='cursor: pointer; text-align:right; margin-top: 5px; float: right; font-size: 15px;'>" . "[Reply]" . "</a></dt>";
            }      
			
            echo '<dd >' . $row['text'] . '</dd>';
			echo "</comment>";

		}
	}

	$database -> close( );


?>
