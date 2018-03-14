<?php
    require_once 'firebase.php';
    $object =new FireBase();
    $data = $object->readFromDocument("name");
    echo $data;
    $test = array(
        "name" => "piklu",
    );
    $object->readFromDocument("", $test);
?>