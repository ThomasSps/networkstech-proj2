<?php 
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database->connect();

	function getPostLikes ($id)
	{
		$query = "SELECT COUNT(`u_id`) AS `count` FROM `post_like` WHERE `p_id`=" . $id;
		$result = mysql_query( $query );
		$row = mysql_fetch_assoc($result);
		$likes = $row['count'] != null ? $row['count'] : 0;
		return $likes;
	}
?>