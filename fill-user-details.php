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
    function getnumPosts( )
    {
    global $uname;
    
    $query = 'SELECT `id` FROM `user` WHERE `uname` = "' . $uname . '"';
    $res = mysql_query( $query );
    $row = mysql_fetch_assoc( $res );
    $u_id = $row['id'];   
        
    $u_query = 'SELECT COUNT(text) AS num FROM `post` WHERE `u_id` = "' . $u_id . '"';
    $u_res = mysql_query( $u_query );
    $u_row = mysql_fetch_assoc( $u_res );
    $u_num = $u_row['num'];
    echo $u_num;
    }
?>