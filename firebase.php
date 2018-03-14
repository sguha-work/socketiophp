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

        /**
         * This function is used to read from the database, call it with proper document name and the 
         * data will be returned. Need to provide proper key structure in order to get perticular data
         * 
         */
        public function readFromDocument($key) {
            return $this->firebase->get($this->DEFAULT_PATH . '/name');
        }

        /**
         * This function is used for writing the data to database
         */
        public function writeToDocument($key, $dataArray) {
            try {
                $this->firebase->set('/'.$key."/", $dataArray);
            } catch(Exception $e) {
                echo $e;
                die;
            }
        }

    }

    
?>

