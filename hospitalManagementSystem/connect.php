<?php 

try {
    $db= new PDO("mysql:host=localhost; dbname=hospital; charest=utf8", 'root','');
   // echo 'success';
} catch (Exception $e) {
    echo $e->getmessage();
}

?>