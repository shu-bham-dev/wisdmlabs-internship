<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    $conn->beginTransaction();
  // our SQL statements
  $conn->exec("INSERT INTO studenttable(name,age,class,gender) VALUES('kreeti',22,17,'female')");
  $conn->exec("INSERT INTO studenttable(name,age,class,gender) VALUES('anushka',21,12,'female')");
  $conn->exec("INSERT INTO studenttable(name,age,class,gender) VALUES('vaibhav',19,10,'male')");

  // commit the transaction
  $conn->commit();
  echo "New records created successfully";

}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}



?>