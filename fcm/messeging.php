<?php
class Messeging {
    private $deviceToken;
    private $apiKey = "AAAA3oOSzMM:APA91bEJ9ePaqevVwIHRQQqz7VIgK9PWkFm1BH8V8xpSL6PQ5uwLeT3y1FEq-AXPX6hCPyFHFt3NU22XNXb3kepVSc6hPFVyp0K5sNqqGeNlFwgmbel7A2kUTRw5ojQvw9SPjButszjs";
    private $url = "https://fcm.googleapis.com/fcm/send";

    function __construct($deviceToken) {
        $this->deviceToken = $deviceToken;
    }
    function sendmessage_android($title, $message){ 
            $fields = array('registration_ids'  => array($this->deviceToken), 'notification' => array('title' => $title, 'body' => $message));//get the device token from Android 
            $headers = array( 'Authorization: key=' . $this->apiKey,'Content-Type: application/json');
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $this->url );
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
            curl_close($ch);echo "</br>".$result;
            $curl_message=json_decode($result);
            if(gettype($curl_message)=="object" && $curl_message->success == 1) {
                return $result;
            } else {
                return "{'success':0, 'failure': 1}";
            }
            
    }
}
?>