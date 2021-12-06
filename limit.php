<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    $sql = "SELECT * FROM studenttable LIMIT 6";
    
    $stmt = $conn->query($sql);
    echo "<br><pre>";
    while ($row = $stmt->fetch()) {   
        print_r($row);
    }
    
    
}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}


?>