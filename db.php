<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "userdb";

    require_once 'socket.php';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query("INSERT INTO user VALUES (NULL, 'amit', NULL, NULL)") == TRUE) {
        echo "1 row inserted";
        //$socket->on('chat message', function($msg)use($io){
            $io->emit('chat message', $msg);
        //});
    } else {
        echo mysqli_error($conn);
    }
    
?>