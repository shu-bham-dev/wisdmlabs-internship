<?php

// include '../models/form.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(isset($_SESSION["name"])){
    ?>
    <!-- Welocome note with menus for registered users -->
    <div class='afterlogin'><h3>Hi <?php echo $_SESSION['name'];?>, You are successfully logged in</h3>
        <nav><ul><li>
        <a href='../logout/index.php'>Log out</a> </li>
        <li><a href='../editaccount/index.php'>Edit Account</a></li></ul>
        </nav>
    </div><hr>

    <?php
    }
    ?>

    <div class="para">
        <div class="head">Welcome to Web 3.0 - The Future</div>
        <div class="para1 styles">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum
        vehicula est vitae sollicitudin. Ut pulvinar ultricies posuere. Integer
        ac iaculis dui, vel rhoncus erat. In tortor nisl, vulputate quis ante
        vel, vestibulum luctus nunc. Phasellus id lectus ante. Vivamus ultrices,
        nunc ut sollicitudin hendrerit, leo tellus lacinia nulla, at porta orci
        orci eget eros. Nullam id ullamcorper mauris, sit amet cursus risus.
        Nullam a commodo metus, et facilisis velit. Maecenas volutpat mattis
        odio vel dignissim. Etiam ac fringilla diam, suscipit sodales ipsum. Nam
        in velit quam. Nunc luctus tempor leo, vel rhoncus mi mattis nec. Lorem
        ipsum dolor sit amet, consectetur adipiscing elit. Nullam felis massa,
        ultrices sit amet turpis vel, accumsan blandit est. Etiam nec eros
        commodo, cursus turpis pulvinar, volutpat odio.</p>
        </div>


        <!-- This paragraph is for registered user only -->
        <?php
        if(isset($_SESSION["name"])){
        ?>
        <div class='para2 styles'>
            <p> Sed vitae turpis ac nisi malesuada blandit. Quisque eu molestie eros. Donec
        facilisis hendrerit augue, eu adipiscing sem lacinia non. Integer
        sodales purus odio, non pharetra massa accumsan in. In vitae nunc non
        erat posuere tempus a id ipsum. Suspendisse enim augue, bibendum eget
        nunc in, lacinia ultrices tortor. Nam enim lorem, gravida eget varius
        eu, euismod et purus. Etiam egestas sem eu nisi porttitor pharetra.
        Donec eu libero eu lorem convallis porta. Nullam interdum vitae lorem
        sit amet dignissim. Proin sit amet tortor ac odio varius dapibus nec at
        Sem.</p>
        </div>

        <!-- Buttons for non-registred users -->
        <?php
        }else{
        ?>

        <div class='login'>
            <p>To read more, please
                <button id='readmore'> <a href='../login/'>LOGIN</a></button> or
                <button id='readmore'> <a href='../signup/'> REGISTER</a></button>
            </p>
        </div>


        <?php
        }
        ?>

    </div>
</body>
</html>