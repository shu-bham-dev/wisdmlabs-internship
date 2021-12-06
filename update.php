<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    $sql = "UPDATE studenttable SET age = 23 where id=16";
    
    $conn->exec($sql);
    echo "UPDATED SUCCESSFULLY";

    
}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}


?>