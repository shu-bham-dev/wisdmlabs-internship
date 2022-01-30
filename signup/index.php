<?php

include '../models/form.php';
include '../models/sessions.php';
Session::ifSession();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>PHP Task - Sign Up</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>

<div class='nav'>
         <div class='head'>
            Welcome to Web 3.0 - The Future</div>
            <nav><ul><li>
               <a href='../home'>Home</a></li><li><a href='../login'>Login</a></li></nav></div><hr>
               <!-- REGISTRATION -- FORM -->
         <div class="container">
         <div class="signup-form">
         <h2 class="infos">Register Account</h2>
         <h3 id="notified">

         <?php
            if(isset($_SESSION["error"])){
               $error = $_SESSION["error"];
               echo "<span>$error</span>";
               unset($_SESSION['error']);
            }
         ?>
         
         </h3>
            <form name="formName" action="index.php" method="post" onsubmit="">
            <div class="inputContainer">
               <label for="name">Name:</label>
               <input type="text" id="name" name="user_name" title="should contains alphabets"
               value='<?php echo isset($_SESSION["tempUser"]->user_name) ? $_SESSION["tempUser"]->user_name : ''; ?>'>
               <span id="nameInfo" class="text-danger"> <?php if(isset($_SESSION['validation_error']['phone'])) echo $_SESSION['validation_error']['user_name']; ?>
               </span></div>

               <div class="inputContainer">
               <label for="name">Username:</label>
               <input type="text" id="username" name="user_username"
               value="<?php echo isset($_SESSION["tempUser"]->user_username) ? $_SESSION["tempUser"]->user_username : ''; ?>">
               <span id="usernameInfo" class="text-danger"> </span></div>

               <div class="inputContainer">
               <label for="phone">Phone Number:</label>
               <input type="tel" id="phone" name="phone" title="Starts with 9/8/7/6 and must be 10 digits and all must contain numbers" placeholder="7007592373" value="<?php echo isset($_SESSION["tempUser"]->phone) ? $_SESSION["tempUser"]->phone : ''; ?>">
               <span id="phoneInfo" class="text-danger"> </span></div>

               <div class="inputContainer">
               <div class="gender">
               <label for="gender">Choose your gender:</label>
               <select name="user_gender" id="gender">
                  <option <?php echo (isset($_SESSION["tempUser"]->user_gender) AND strtolower($_SESSION['tempUser']->user_gender) == 'male') ? 'selected':null; ?> value="male">Male</option>
                  <option <?php echo (isset($_SESSION["tempUser"]->user_gender) AND strtolower($_SESSION['tempUser']->user_gender) == 'female') ? 'selected':null; ?> value="female">Female</option>
                  <option <?php echo (isset($_SESSION["tempUser"]->user_gender) AND strtolower($_SESSION['tempUser']->user_gender) == 'transgender') ? 'selected':null; ?>  value="transgender">Other</option>
               </select>
               <span id="genderInfo" class="text-danger"> </span>
               </div></div>

               <div class="inputContainer">
               <label for="email">Email:</label>
               <input type="email" id="mail" name="user_email" value="<?php echo isset($_SESSION["tempUser"]->user_email) ? $_SESSION["tempUser"]->user_email : ''; ?>">
               <span id="emailInfo" class="text-danger"> </span></div>

               <div class="inputContainer">
               <label for="password">Password:</label>
               <input type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password" name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
               <span id="passInfo" class="text-danger"> </span></div>


               <div class="inputContainer">
               <label for="cnf-password">Confirm Password:</label>
               <input type="password" id="cnf-password" name="user_cnf_password">
               <span id="cnfInfo" class="text-danger"> </span></div>

               <button id="sub"type="submit" >Sign Up</button>
            </form>
         </div>
      </div>
      <!-- <script type="text/javascript">
            $(document).ready(function(){
               $("#sub").on("click",function(e){
                  $.ajax({
                     url: "same.php",
                     type: "POST",
                     success: function(data){
                        $.("#notified").html(data);
                     }
                  });
               });
            });
      </script> -->
      <script src="formvalidator.js"></script>
   </body>
</html>