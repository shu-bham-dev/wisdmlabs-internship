<?php
use PHPMailer\PHPMailer\PHPMailer;
include '../models/sessions.php';
Session::ifSession();
?>
<html>
    <head>
        <title>Forgot Password</title>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class='nav'>
        <div class='head'>
            Welcome to Web 3.0 - The Future</div>
            <nav><ul><li>
                <a href='../home'>Login</a></li>
            </nav>
        </div>
        <hr>
                <?php
                    include('db.php');
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        if (!$email) {
                            $error .="Invalid email address";
                        } else {
                            $sql = "SELECT * FROM `phptask` WHERE email='" . $email . "'";
                            $result = $conn->query($sql);
                            $row = $result->rowCount();
                            if ($row == "") {
                                echo "<style>center{color:red; font-weight:600;}</style><center>Invalid email / User not found!</center>";
                                // exit();
                            }
                            else {

                            $output = '';
                            //mktime(hour, minute, second, month, day, year, is_dst) - return unixtimestamp.
                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            $sql2 = "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "')";
                            $res = $conn->query($sql2);

                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost/phpTask/forgot/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/phpTask/forgot/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;
                            require("../vendor/autoload.php");
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            $mail->Host = "smtp.gmail.com"; // Enter your host here
                            $mail->SMTPAuth = true;
                            $mail->Username = "singhforbing@gmail.com"; // Enter your email here
                            $mail->Password = "Shubham-sahu1@"; //Enter your passwrod here
                            $mail->Port = 587;
                            $mail->IsHTML(true);


                            //Recipients
                        $mail->setFrom('singhforbing@gmail.com', 'Mailer');
                        $mail->addAddress($email);

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                echo "<style>center{color:green; font-weight:600;}</style><center>An email has been sent! Kindly check your inbox.</center>";
                            }
                        }
                        }
                    }
                    ?>
             <div class="container">
                <div class="signup-form">
                  <h2 class="infos">Forgot Password</h2>
                    <form method="post" action="" name="reset" onsubmit="return validateForm()">
                        <div class="form-group">
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" id="mail" name="email" placeholder="Enter your email" class="form-control"/>
                            <span id="emailInfo" class="text-danger"> </span>
                        </div>

                        <div class="form-group">
                            <button type="submit" id="reset" value="Reset Password"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
    </body>
    <script>
        function validateForm() {
        let email = document.getElementById("mail").value;

    if (email == "") {
        document.getElementById('emailInfo').innerHTML = "<style>.text-danger{font-weight:600; color:red;}</style><br>Email field can not be empty!";
        return false;
    }
        }
    </script>
</html>