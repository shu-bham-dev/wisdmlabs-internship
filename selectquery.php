<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);
}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}

$idnum = 7;
$name = 'Shubham';
$sql = "select * from studenttable where id=? and name=? ";
$stmt = $conn->prepare($sql);
$stmt->execute([$idnum, $name]);
$result = $stmt->fetch();

echo "my name is ". $result->name;

?>