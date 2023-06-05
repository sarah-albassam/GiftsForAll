<?php

    $mysqli = new mysqli('localhost', 'root', '', 'giftsforall'); //add your name in username 
    
    // Check for connection errors
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit;
    }
    
    // Now you can use the $mysqli object for database operations
    return $mysqli






?>
