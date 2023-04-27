<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $reldb = 'db_agroinvity';
    $db_conn = mysqli_connect($host, $user, '', $reldb);
    if ($db_conn) {
        // echo 'Sucess' . "<br>";
        mysqli_select_db($db_conn, $reldb);
    }
?>