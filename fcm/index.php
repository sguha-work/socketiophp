<?php
    require_once 'messeging.php';

    $article = array("article_id"=>"4a216c66-2f40-4fa6-a1b1-ba50f486cb23","title"=>"HDS CSU 0111 (FAP 130 4372/12 & /13) will be updated","introduction_text"=>"Dummy Text as introduction");

    $message = json_encode($article);
    $title = $article["title"];
    // sending messege to android device
    $androidDeviceID = "cat9oY7KxgA:APA91bH3lRt34Q0A9dQvJiKKxXG9xgg13iOGVqDJswJURksqiATr-BC3HjekVAls02tAcOD-54W1UzAgbplfAKfxCH2nvFvVL-FkAYJBewjPwc-Hh4sznOtXamBes77BWkPcWoQ_FgH3";
    $messegeObject = new Messeging($androidDeviceID);

    $result = $messegeObject->sendmessage_android($title, $message);
    $decodedResult = json_decode($result);

    if($decodedResult -> success) {
        echo "</br>messege sent to android device";
    } else {
        echo "Failed";
    }

    // sending messege to android device
    $iosDeviceID = "e95pK1FH_8Y:APA91bHPeMn1ntEAfip26fpYvh_6QIixpgPoLvTgWOzDPJoN3_63w7JeqFq5x0BZoc_kB5pfFQBh--5i_ypyk3Q113FgCkaU0BBMtpNe1ghHNKq-NILG7I4hLSll6YPG7CnI65blnkeV";
    $messegeObject2 = new Messeging($iosDeviceID);

    $result2 = $messegeObject2->sendmessage_android($title, $message);
    $decodedResult2 = json_decode($result2);

    if($decodedResult2 -> success) {
        echo "</br>messege sent to ios device";
    } else {
        echo "Failed";
    }
?>