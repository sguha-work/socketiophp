<?php
class Messeging {
    function sendmessage_android($devicetoken,$message){ 
            $api_key     =   'AIzaSyCtDch9K3ZqGF_SSLYCz4JjMS4-fkJuW';//get the api key from FCM backend
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array('registration_ids'  => array($devicetoken));//get the device token from Android 
            $headers = array( 'Authorization: key=' . $api_key,'Content-Type: application/json');
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($fields) );
            $result = curl_exec($ch);
            if(curl_errno($ch)){
                return 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch);
            $cur_message=json_decode($result);
            if($cur_message->success==1)
                return true;
            else
                return false;
    }
}
?>