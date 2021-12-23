<?php

$status = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
   $status = false;
   // include '/opt/lampp/htdocs/phpTask/models/dbconn.php';
   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";
   // exit();
   // Grabbing the data
   $name = $_POST["user_name"];
   $username = $_POST["user_username"];
   $phone = $_POST["phone"];
   $gender = $_POST["user_gender"];
   $email = $_POST["user_email"];
   $password = $_POST["user_password"];
   $con_password = $_POST["user_cnf_password"];

   // SignupContrl class
   include_once "../models/dbconn.php";
   include_once "../classes/signup.php";
   include_once "../controllers/signup.php";
   $signup = new SignupContr($name, $username, $phone, $email, $password, $con_password,$gender);

   // Running error handlers and user signup
   $signup->signupUser();

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