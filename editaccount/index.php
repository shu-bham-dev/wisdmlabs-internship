<?php

include '../common.php';

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
    <div class='nav'>
        <div class='head'>
            Welcome to Web 3.0 - The Future</div>
            <nav><ul> <li>
                <a href='../home'>Home</a></li>
    <?php
    if(isset($_SESSION["name"])){
    ?>
        <li><a href='../logout/index.php'>Log out</a></li>
        </ul></nav></div><hr>

    <?php
    } ?>
    
    <div class="container">
        <div class="signup-form">
    <h2 class="infos">Update Account</h2>
    
    <form action="../models/update.php" method="post" onsubmit="return validateForm()">
                <label for="name">Name:</label>
                <input type="text" id="name" name="user_name" value="<?php echo $_SESSION['name'];?>">
                <span id="nameInfo" class="text-danger"> </span>
                <label for="name">Username:</label>
                
                <input type="text" class="fixed" id="username" pattern=[0-9]{10} name="user_username" value="<?php echo $_SESSION['username'];?>" readonly>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['phone'];?>">
                <span id="phoneInfo" class="text-danger"> </span>

                <label for="gender">Choose your gender:</label>
                <select name="user_gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Other</option>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="mail" name="user_email" value="<?php echo $_SESSION['email'];?>">
                <span id="emailInfo" class="text-danger"> </span>

                <button type="submit" id="submitform">Update</button>
                </form>
                </div></div>

                <?php
                if(isset($_SESSION["changed"])) {
                    if($_SESSION["changed"] == "changed"){
                        $_SESSION["changed"] = "unchanged"
                ?>

                <style>
                p{
                    margin: auto;
                    width: 18%;
                    color:green;
                    margin-top: -36.7em;
                }
                </style>

                <p>Account information is updated successfully.</p>
                <?php }}?>
<script src="formvalidator.js"></script>
</body>
</html>