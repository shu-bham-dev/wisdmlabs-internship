<?php

include '../models/form.php';

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>PHP Task - Sign Up</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      
      <div class="container">
         <div class="head">
            Welcome to Web 3.0 - The Future
         </div>

      <!-- REGISTRATION -- FORM -->
         <div class="signup-form">
            <form name="formName" action="index.php" method="post" onsubmit="return validateForm()">
               <label for="name">Name:</label>
               <input type="text" id="name" name="user_name">

               <label for="name">Username:</label>
               <input type="text" id="username" name="user_username">

               <label for="phone">Phone Number:</label>
               <input type="tel" id="phone" name="phone" title="Starts with 9/8/7/6 and must be 10 digits"  placeholder="7007592373">

               <div class="gender">
               <label for="cars">Choose your gender:</label>
               <select name="user_gender" id="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="transgender">Other</option>
               </select>
               </div>

               <label for="email">Email:</label>
               <input type="email" id="mail" name="user_email">

               <label for="password">Password:</label>
               <input type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password" name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

               <label for="cnf-password">Confirm Password:</label>
               <input type="password" id="cnf-password" name="user_cnf_password">

               <button type="submit" >Sign Up</button>
            </form>
         </div>
      </div>
      <script src="formvalidator.js"></script>
   </body>
</html>