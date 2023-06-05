<?php
    // Create Connection
    $conn = mysqli_connect('localhost', 'root', '', 'giftsforall'); //add your name in username 

    // Check Connection
    if(mysqli_connect_errno()){
        // Connection Failed
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }
?>
