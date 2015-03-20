<?php 
    
    $uname = isset($_GET['uname']) ? $_GET['uname'] : $_SESSION['uname'];

    function getUname( )
    {
          global $uname;
          echo $uname;
    }

    function getSince( )
    {
        global $uname;
        $query = 'SELECT `since` FROM `user` WHERE `uname` = "' . $uname . '"';
        $u_res = mysql_query( $query );
        $u_row = mysql_fetch_assoc( $u_res );
        $u_since = $u_row['since'];
        $month= date("F", mktime(0, 0, 0, substr($u_since,6,2), 10));
        echo substr($month,0,3) . '.' .  substr($u_since,0,4);
    }
    
    function getnumUPosts( )
    {
        global $uname;
    
        $query = 'SELECT `id` FROM `user` WHERE `uname` = "' . $uname . '"';
        $res = mysql_query( $query );
        $row = mysql_fetch_assoc( $res );
        $u_id = $row['id'];   
        
        $u_query = 'SELECT COUNT(text) AS num FROM `post` WHERE `u_id` = "' . $u_id . '"';
        $u_res = mysql_query( $u_query );
        $u_row = mysql_fetch_assoc( $u_res );
        $u_posts = $u_row['num'];
        
        echo $u_posts;
    }
    
    function getnumUComms( )
    {
        global $uname;
    
        $query = 'SELECT `id` FROM `user` WHERE `uname` = "' . $uname . '"';
        $res = mysql_query( $query );
        $row = mysql_fetch_assoc( $res );
        $u_id = $row['id'];   
        
        $u_query = 'SELECT COUNT(text) AS posts FROM `comment` WHERE `u_id` = "' . $u_id . '"';
        $u_res = mysql_query( $u_query );
        $u_row = mysql_fetch_assoc( $u_res );
        $u_comms = $u_row['posts'];
    
        echo $u_comms;
    }
    
    function getnumULikes( )
    {
        global $uname;
    
        $query = 'SELECT `id` FROM `user` WHERE `uname` = "' . $uname . '"';
        $res = mysql_query( $query );
        $row = mysql_fetch_assoc( $res );
        $u_id = $row['id'];   
        
        $u_query = 'SELECT COUNT(p_id) AS likes FROM `post_like` WHERE `u_id` = "' . $u_id . '"';
        $u_res = mysql_query( $u_query );
        $u_row = mysql_fetch_assoc( $u_res );
        $u_likes = $u_row['likes'];
    
        echo $u_likes;
    }
    
    function getnumPComms( )
    {
        global $uname;
    
        $query = 'SELECT `id` FROM `user` WHERE `uname` = "' . $uname . '"';
        $res = mysql_query( $query );
        $row = mysql_fetch_assoc( $res );
        $u_id = $row['id'];   
        
        $p_query = 'SELECT COUNT(comment.p_id) AS comm_count FROM `comment` INNER JOIN `post` ON comment.p_id = post.id WHERE post.u_id = "' . $u_id . '" ';
        $p_res = mysql_query( $p_query );
        $p_row = mysql_fetch_assoc( $p_res );
        $p_comms = $p_row['comm_count'];
        
        echo $p_comms;
    }
    
    function getnumPLikes( )
    {
        global $uname;
    
        $query = 'SELECT `id` FROM `user` WHERE `uname` = "' . $uname . '"';
        $res = mysql_query( $query );
        $row = mysql_fetch_assoc( $res );
        $u_id = $row['id'];   
        
        $p_query = 'SELECT COUNT(post_like.p_id) AS like_count FROM `post_like` INNER JOIN `post` ON post_like.p_id = post.id WHERE post.u_id = "' . $u_id . '" ';
        $p_res = mysql_query( $p_query );
        $p_row = mysql_fetch_assoc( $p_res );
        $p_likes = $p_row['like_count'];
        
        echo $p_likes;
    }

?>