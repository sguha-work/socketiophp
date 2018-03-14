<?php
    require __DIR__.'/vendor/autoload.php';
        
    class FireBase {
        
        private $DEFAULT_URL;
        private $DEFAULT_TOKEN;
        private $firebase;
        private $DEFAULT_PATH = '';

        function __construct() {
            $myfile = fopen("google-service-account.json", "r") or die("Unable to open account file!");
            $data = json_decode(fread($myfile,filesize("google-service-account.json")));
            $this->DEFAULT_URL = $data->databaseURL;
            $this->DEFAULT_TOKEN = $data->apiKey;
            $this->firebase = new \Firebase\FirebaseLib($this->DEFAULT_URL, $this->DEFAULT_TOKEN);
        }

        function readFromDocument($key) {
            return $this->firebase->get($this->DEFAULT_PATH . '/name');
        }

        function writeToDocument($key, $dataArray) {
            try {
                $this->firebase->set('/', $dataArray);
            } catch(Exception $e) {
                echo $e;
                die;
            }
        }

    }

    
?>

