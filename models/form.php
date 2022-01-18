<?php

$status = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
   // $status = false;
   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";
   // exit();
   // Grabbing the data
   $name = $_POST["user_name"];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $username = $_POST["user_username"];
   $username = filter_var($username, FILTER_SANITIZE_STRING);
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
   session_start();
   $_SESSION["name"] = $name;
   $_SESSION["username"] = $username;
   $_SESSION["phone"] = $phone;
   $_SESSION["gender"] = $gender;
   $_SESSION["email"] = $email;
   $_SESSION["password"] = $password;
   
   //sending mail to users
   include_once "../controllers/mail.php";
   $sendMail = new Sender($username,$email);
   $sendMail->sendMail();
   
   
   //Going to back to front page

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