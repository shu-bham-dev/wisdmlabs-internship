<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <div class="row">
                <div>
                    <?php
                    $error="";
                    include('db.php');
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");

                        $query2 = "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "' ";
                        $res11 = $conn->prepare($query2);
                        $res11->execute();

                        $row = $res11->rowCount();
                        if ($row == "") {
                            $error .= '<h2>Invalid Link</h2>';
                            echo $error;
                        } else {
                            $row = $res11->fetchAll(PDO::FETCH_ASSOC);
                            $expDate = $row[0]['expDate'];
                            if ($expDate >= $curDate) {
                                ?>
<!-- <div class="container"> -->
<!-- <div class='nav'>
    <div class='head'>
    Welcome to Web 3.0 - The Future
</div><button id='home'><a href='../home'>Home</a></button></div> -->

<div class='nav'>
        <div class='head'>
            Welcome to Web 3.0 - The Future</div>
            <nav><ul><li>
                <a href='../home'>Home</a></li></nav></div><hr>


<div class="container">
    <div class="signup-form">
    <h2 class="infos">Reset Password</h2>
                                <form method="post" action="" name="update" onsubmit="return validateForm()">

                                    <input type="hidden" name="action" value="update" class="form-control"/>
                                    <div class="form-groups">
                                        <label><strong>Enter New Password:</strong></label>
                                        <input type="password" required title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="mail" name="pass1" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                        <span id="emailInfo" class="text-danger"> </span>
                                    </div>

                                    <div class="form-groups">
                                        <label><strong>Re-Enter New Password:</strong></label>
                                        <input type="password" required id="conmail" name="pass2" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                        <span id="conInfo" class="text-danger"> </span>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                    <div class="form-groups">
                                        <button type="submit" id="reset" value="Reset Password">Submit</button>
                                    </div>

                                </form>
                            </div>
                            </div>

                                <?php
                            } else {
                                $error .= "<h2>Link Expired</h2>>";
                            }
                        }
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $pass1 = $_POST["pass1"];
                        $pass2 = $_POST["pass2"];
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {
                            $pass1 = md5($pass1);
                            $sql2 = "UPDATE `phptask` SET `password` = '". $pass1 ."' WHERE `email` = '" . $email . "'";
                            $res2 = $conn->query($sql2);
                            
                            $sql3 = "DELETE FROM `password_reset_temp` WHERE `email` = '$email'";
                            $res3 = $conn->query($sql3);

                            // $message = "Congratulations! Your password has been updated successfully.";
                            // echo "<script type='text/javascript'>alert('$message');</script>";
                            echo "<div class='congo'><p>Congratulations! Your password has been updated successfully.</p><br>
                            <button id='home'><a href='../login'>Login</a></button> ";
                            // header("location: ../home");
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
    <script>
        function validateForm() {
        let email = document.getElementById("mail").value;
        let conmail = document.getElementById("conmail").value;

    if (email == "") {
        document.getElementById('emailInfo').innerHTML = "<style>.text-danger{color:red;}</style><br>Email field can not be empty!";
        return false;
    }
    if (conmail == "") {
        document.getElementById('conInfo').innerHTML = "<style>.text-danger{color:red;}</style><br>Email field can not be empty!";
        return false;
    }
    if(conmail!=email){
        document.getElementById('conInfo').innerHTML = "<style>.text-danger{color:red;}</style><br>Password do not match!";
        return false;
    }
        }
    </script>
</html>