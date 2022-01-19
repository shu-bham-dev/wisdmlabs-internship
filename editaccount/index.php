<?php

include '../models/form.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task - Edit Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    echo "<div class='nav'>
    <div class='head'>
    Welcome to Web 3.0 - The Future
</div><button id='home'><a href='../home'>Home</a></button> ";
    if(isset($_SESSION["name"])){
    echo "
        <button id='logout'><a href='../logout/index.php'>Log out</a></button> 
        <button id='edit'>Edit Account</button></div>";
    }
    ?>
    
    <?php
    echo '
    <div class="infos"> <b class="headinfo">Update account </b><br><p>Edit the information you want to change</p></div>
    </div>
    <div class="container">
        <div class="signup-form">
                <form action="../models/update.php" method="post" onsubmit="return validateForm()">
                <label for="name">Name:</label>
                <input type="text" id="name" name="user_name" value="'.$_SESSION["name"].'">
                <span id="nameInfo" class="text-danger"> </span>

                <label for="name">Username:</label>
                <input type="text" class="fixed" id="username" pattern=[0-9]{10} name="user_username" value="'.$_SESSION["username"].'" readonly>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" value="'.$_SESSION["phone"].'">
                <span id="phoneInfo" class="text-danger"> </span>


                <label for="gender">Choose your gender:</label>
               <select name="user_gender" id="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="transgender">Other</option>
               </select>

                <label for="email">Email:</label>
                <input type="email" id="mail" name="user_email" value="'.$_SESSION["email"].'">
                <span id="emailInfo" class="text-danger"> </span>


                <button type="submit" id="submitform">Update</button>
                </form>
                </div></div>';
                
                ?>
                
                <?php
                if($_SESSION["changed"] == "changed"){
                    $message = "Account Information is updated successfully.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                ?>

<script src="formvalidator.js"></script>
</body>
</html>