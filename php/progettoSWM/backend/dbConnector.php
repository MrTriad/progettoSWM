<?php

    $servername = "db";
    $username = "triad";
    $password = "Database!8";
    $dbname = "trainingSWM";

    $db = new mysqli($servername, $username, $password, $dbname);
    
    if ($db->connect_error) {
        
        die("Connection failed: " . $db->connect_error);
    }
?>