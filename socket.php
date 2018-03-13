<?php
    
   
    require_once 'vendor/autoload.php';
    
    use Workerman\Worker;
    use PHPSocketIO\SocketIO;

    // listen port 2021 for socket.io client
    $io = new SocketIO(2021);
    $io->on('connection', function($socket)use($io){
        
    });

    Worker::runAll();
?>