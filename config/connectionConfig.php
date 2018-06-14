<?php
    define('DB_USER', 'id2327310_raduser');
    define('DB_PASSWORD', 'raduser');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'id2327310_rad_project');
    
    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die('could not connect to MySQL!'.
            mysqli_connect_errno());
?>