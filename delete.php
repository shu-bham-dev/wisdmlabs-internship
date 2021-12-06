<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    $sql = "DELETE from studenttable where id=7";
    
    $conn->exec($sql);
    echo "DELETED SUCCESSFULLY";

    
}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}


?>