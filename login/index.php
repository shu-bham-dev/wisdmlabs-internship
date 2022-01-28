<?php
include '../models/login.php';
include_once "../models/sessions.php";
Session::ifSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class='nav'>
        <div class='head'>
            Welcome to Web 3.0 - The Future</div>
            <nav><ul><li>
                <a href='../home'>Home</a></li><li>
                <a href='../signup'>Register</a></li></nav></div><hr>
      <!-- REGISTRATION -- FORM -->
    <div class="container">
    <div class="signup-form">
    <h2 class="infos">Login Account</h2>
            <form action="index.php" method="post" onsubmit="return validateForm()">

               <label for="name">Username</label>
               <input type="text" id="username" name="user_username">
               <span id="usernameInfo" class="text-danger"> </span>

               <label for="password">Password</label>
               <input type="password" id="password" name="user_password">
               <span id="passInfo" class="text-danger"> </span>

               <button type="submit">Login</button>
            </form>

            <button class="fpass"> <a href="../forgot"> Forgot Password </a></button>

         </div>
      </div>
      <script src="formvalidation.js"></script>
    </body>
</html>