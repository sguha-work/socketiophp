<?php
    require_once 'messeging.php';

    $androidDeviceID = "dTUIwspcg9M:APA91bH9XlTJEfTdY0HEbaV7DEhI4le1LtXoqo0aNvY2qlu3DeHCzkjYrWwBASliESjAgOjGCmPc-T60eVnTFpcqQqBNbcJAWWJpsKHvKtVQNiLYz-yBEaxJaBgUfJh52r6M9iTfrIDh";
    
    $messegeObject = new Messeging($androidDeviceID);

    $result = $messegeObject->sendmessage_android('Test message', 'This is a test messege for android device');
    $decodedResult = json_decode($result);

    if($decodedResult -> success) {
        echo "messege sent";
    } else {
        echo "Failed";
    }
?>