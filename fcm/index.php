<?php
    require_once 'messeging.php';

    $article = array("signum"=>"ESAHGUH", "article_id"=>"ca29dca3-910c-410d-850d-6d807e85750e", "title"=>'GOOD TO KNOW : : MSDP : INFORMATION REGARDING (BIDWH- KISTA) - Custom SQL based reports on "OneMSDP" Universe for "TT,CR,PT,MR,WO-Int" Subject Area wi',"introduction_text"=>'MSDP: Custom SQL based reports on "OneMSDP Universe” for "TT,CR,PT,MR,WO-Int" Subject Area will be discontinued');

    $message = json_encode($article);
    $title = $article["title"];
    $articleId =  $article["article_id"];
    echo "</br> Messege to be delivered";
    echo "</br>".$message;
    // sending messege to android device
    echo "</br>Sending messege to android device";
    $androidDeviceID = "cat9oY7KxgA:APA91bH3lRt34Q0A9dQvJiKKxXG9xgg13iOGVqDJswJURksqiATr-BC3HjekVAls02tAcOD-54W1UzAgbplfAKfxCH2nvFvVL-FkAYJBewjPwc-Hh4sznOtXamBes77BWkPcWoQ_FgH3";
    $messegeObject = new Messeging($androidDeviceID);

    $result = $messegeObject->sendMessageToFCM($title, $articleId, $message);
    $decodedResult = json_decode($result);

    if($decodedResult -> success) {
        echo "</br>messege sent to android device";
    } else {
        echo "Failed";
    }

    // sending messege to android device
    $iosDeviceID = "e95pK1FH_8Y:APA91bHPeMn1ntEAfip26fpYvh_6QIixpgPoLvTgWOzDPJoN3_63w7JeqFq5x0BZoc_kB5pfFQBh--5i_ypyk3Q113FgCkaU0BBMtpNe1ghHNKq-NILG7I4hLSll6YPG7CnI65blnkeV";
    echo "</br>Sending messege to ios device";
    $messegeObject2 = new Messeging($iosDeviceID);
    $result2 = $messegeObject2->sendMessageToFCM($title, $articleId, $message);
    $decodedResult2 = json_decode($result2);

    if($decodedResult2 -> success) {
        echo "</br>messege sent to ios device";
    } else {
        echo "Failed";
    }
?>