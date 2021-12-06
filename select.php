<?php

try{

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'phppdo';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    $sql = "SELECT name, age, class, gender from studenttable";
    $result = $conn->query($sql);


    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo "id: " .$row["id"]. "-Name:".$row["name"]." ".$row["gender"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    
}catch(PDOException $e){
    echo 'Error :' .$e->getMessage();
}


?>