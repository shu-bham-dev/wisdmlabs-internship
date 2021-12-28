
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $name = $_POST["user_name"];
   $username = $_POST["user_username"];
   $phone = $_POST["phone"];
   $gender = "male";
   $email = $_POST["user_email"];
   $password = $_POST["user_password"];

   include_once "../models/dbconn.php";
   include_once "../classes/update.php";
   include_once "../controllers/update.php";

   $change = new UpdateUser($name,$username,$phone,$email,$password,$gender);
   $change->editUsers();

   session_start();
   $_SESSION["name"] = $name;
   $_SESSION["username"] = $username;
   $_SESSION["phone"] = $phone;
   $_SESSION["gender"] = $gender;
   $_SESSION["email"] = $email;
   $_SESSION["password"] = $password;
   $_SESSION["changed"] = "changed";

   header("location: ../editaccount/index.php");


}

?>