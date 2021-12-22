<?php

$status = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

   $status = false;
   include '/opt/lampp/htdocs/phpTask/models/dbconn.php';

   // Grabbing the data
   $username = $_POST["user_username"];
   $password = $_POST["user_password"];

   // Instantiate SignupContrl class
   include_once "../models/dbconn.php";
   include_once "../classes/login.php";
   include_once "../controllers/login.php";
   $login = new LoginContr($username, $password);

   // Running error handlers and user signup
   $login->loginUser();

   //Going to back to front page
   header("location: ../home/index.php?error=none");

   // $exist = false;
   // if(($password == $con_password) && $exist==false){
      
   //    $sql = "INSERT INTO `phptask` (`name`, `username`, `phone`, `gender`, `email`, `password`, `dt`) VALUES ('$name', '$username', '$phone', 'male', '$email', '$password', current_timestamp())";
      
   //    $result = $conn->prepare($sql);
      
   //    if($result){
   //       $status = true;
   //    }
   //    $result->execute();
      
   // }
}
?>