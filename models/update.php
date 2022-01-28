
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $name = $_POST["user_name"];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $username = $_POST["user_username"];
   $username = filter_var($username, FILTER_SANITIZE_STRING);
   $phone = $_POST["phone"];
   $gender = $_POST["user_gender"];
   $email = $_POST["user_email"];
   // $password = $_POST["user_password"];
   // $password = md5($password);

   include_once "../models/dbconn.php";
   include_once "../classes/update.php";
   include_once "../controllers/update.php";

   $change = new UpdateUser($name,$username,$phone,$email,$gender);
   $change->editUsers();

   // session_start();
   // $_SESSION["name"] = $name;
   // $_SESSION["username"] = $username;
   // $_SESSION["phone"] = $phone;
   // $_SESSION["gender"] = $gender;
   // $_SESSION["email"] = $email;
   // $_SESSION["password"] = $password;
   $_SESSION["changed"] = "changed";

   header("location: ../editaccount/index.php");


}

?>