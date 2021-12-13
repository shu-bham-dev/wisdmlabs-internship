<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'testphp';
    $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password);

    echo "<pre>";
    if($conn){
        echo "<h1> Welcome to Metaverse: The Real Web 3.0</h1>";
    }
    echo "<br>";

    if($_POST['name']){
    $name= $_POST['name'];
    $age= $_POST['age'];
    $vision= $_POST['vision'];
    $other = '';
    $color = '';

    $sql = "INSERT INTO `testphp` (`name`, `age`, `vision`, `color`, `other`, `dt`) VALUES ('$name', '$age', '$vision', '$color', '$other', current_timestamp());";

    if($conn->query($sql) == true){
        echo "<center><h2> Successfully Submited</h2><center>";
    }else{
        echo "ERROR: $sql <br> $conn->error";
    }
    $conn->close();
    }
    else{
        echo "Please Enter Data";
    }
    
    
?>