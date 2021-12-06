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

//WHY-NOT-WORKING???
// $insertquery = "insert into studenttable(name,age,class,gender) values(:name,:age,:class,:gender)";
// $stmt = $conn->prepare($insertquery);
// $stmt->bindparam(':name',$name);
// $stmt->bindparam(':age',$age);
// $stmt->bindparam(':class',$class);
// $stmt->bindparam(':gender',$gender);

// $name = "Rahul";
// $age = 25;
// $class = 18;
// $gender = 'female';

$insertquery = "insert into studenttable(
    name,age,class,gender) values('saumya',22,17,'female')";
$conn->query($insertquery);

$last_id = $conn->lastInsertId();
echo $last_id;


?>