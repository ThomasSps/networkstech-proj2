<?php
 function check($p_name, $s_name)
    {
    
    // $s_uname = $_SESSION['uname'];

    if ($s_name == $p_name)
    {
        return 1;
    }
    else
    {
        return  0;
    } 
    }
?>