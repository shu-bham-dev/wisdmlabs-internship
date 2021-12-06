<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    $insertquery = "insert into studenttable(name,age,class,gender)
    VALUES (:name,:age,:class,:gender)";
    $stmt = $conn->prepare($insertquery);

    $stmt->bindparam(':name',$name);
    $stmt->bindparam(':age',$age);
    $stmt->bindparam(':class',$class);
    $stmt->bindparam(':gender',$gender);

    $name = "Somesh";
    $age = 22;
    $class = 26;
    $gender = 'male';
    $stmt->execute();


    $name = "Kartik";
    $age = 30;
    $class = 10;
    $gender = 'male';
    $stmt->execute();

}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}


?>