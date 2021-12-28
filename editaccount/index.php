<?php

include '/opt/lampp/htdocs/phpTask/models/form.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task - Edit Account</title>
    <link rel="stylesheet" href="../home/style.css">
</head>
<body>
    <?php
    if(isset($_SESSION["name"])){
        echo "<h2>Hi ," ,$_SESSION['name'], "</h2>" ,"<h2>You are successfully logged in</h2>";
    }
    ?>
    <?php
    if(isset($_SESSION["name"])){
    echo "<div class='nav'>
        <button id='logout'><a href='../logout/index.php'>Log out</a></button> 
        <button id='edit'>Edit Account</button></div>";
    }
    ?>
    <?php
    echo '<div class="signup-form">
            <form action="index.php" method="post">
               <label for="name">Name:</label>
               <input type="text" id="name" name="user_name" value="'.$_SESSION["name"].'">

               <label for="name">Username:</label>
               <input type="text" id="username" name="user_username" value="'.$_SESSION["username"].'">

               <label for="phone">Phone Number:</label>
               <input type="tel" id="phone" name="phone" value="'.$_SESSION["phone"].'">

               <div class="gender">
               <label>Gender:</label><br>
                <input type="radio" id="male" value="male" name="user_gender">
                <label for="male" class="light">Male</label>
                <br>
                <input type="radio" id="female" value="female" name="user_gender">
                <label for="female" class="light">Female</label><br>
               </div>

               <label for="email">Email:</label>
               <input type="email" id="mail" name="user_email" value="'.$_SESSION["email"].'">

               <label for="password">Password:</label>
               <input type="password" id="password" name="user_password">

               <button type="submit">Sign Up</button>
            </form>
        </div>';
    ?>
</body>
</html>