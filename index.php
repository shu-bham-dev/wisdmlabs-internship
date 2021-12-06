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


// if($conn){
//     echo "connection done";
// }else{
//     echo "no connection";
// }

//INSERT VIA QUERY
// $insertquery = "insert into studenttable(
//     name,age,class,gender) values('vinod',16,12,'male')";
// $conn->query($insertquery);

// $selectquery = "select * from studenttable where id=6";
// $stmt = $conn->query($selectquery);
// $result = $stmt->fetch(PDO::FETCH_OBJ);
// echo "<br><pre>";
// print_r($result);

// echo $result['name'];
// echo $result->name;
// echo $result->rowCount();


//Insert via bindparam
$insertquery = "insert into studenttable(name,age,class,gender) values(:name,:age,:class,:gender)";
$stmt = $conn->prepare($insertquery);
$stmt->bindparam(':name',$name);
$stmt->bindparam(':age',$age);
$stmt->bindparam(':class',$class);
$stmt->bindparam(':gender',$gender);

$name = "Shubham";
$age = 22;
$class = 16;
$gender = 'male';


//Print selected query
$selectquery = "select * from studenttable";
$stmt = $conn->query($selectquery);
$result = $stmt->fetch(PDO::FETCH_OBJ);
echo "<br><pre>";
print_r($result);

$result = $stmt->fetch(PDO::FETCH_OBJ);
print_r($result);
$last_id = $conn->lastInsertId();
// echo "LS->" .$last_id;


?>