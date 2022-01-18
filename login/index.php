<?php

include '../models/login.php';

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
<div class="container">
<div class='nav'>
    <div class='head'>
    Welcome to Web 3.0 - The Future
</div><button id='home'><a href='../home'>Home</a></button></div></div>


         <div class="infos"> <b class="headinfo">Login </b><br><p>Fill out your username and password</p></div>

      <!-- REGISTRATION -- FORM -->
         <div class="signup-form">
            <form action="index.php" method="post">

               <label for="name">Username</label>
               <input type="text" id="username" name="user_username">

               <label for="password">Password</label>
               <input type="password" id="password" name="user_password">
               <button type="submit">Login</button>
            </form>

            <button class="fpass"> <a href="../forgot"> Forgot Password </a></button>

         </div>
      </div>
</body>
</html>