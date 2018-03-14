<?php
    
    echo "STEP1 getting data from MySQL";
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "userdb";
    
    $con=mysqli_connect($servername, $username, $password, $dbName);
    
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_errno());
    }

    $sql="SELECT * FROM user";
    echo "</br>Runnin this query to database : <b>".$sql."</b>";
    echo "</br> The data from database are as follows";
    $result=mysqli_query($con,$sql);
    if($result) {
        while ($row=mysqli_fetch_row($result)) {
            echo "</br><b>id</b>: ".$row[0]." <b>Name: </b>".$row[1]." <b>PhoneNumber: </b>".$row[2]." <b>Address: </b>".$row[3];
        }
    }
    mysqli_close($con);

    echo "</br>STEP2: Putting data to firebase";
    require_once 'firebase.php';
    $object =new FireBase();
    $test = array(
        "name" => "piklu",
    );
    $object->writeToDocument("user", $test);
?>