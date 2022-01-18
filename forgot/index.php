<?php
use PHPMailer\PHPMailer\PHPMailer;
?>
<html>
    <head>
        <title>Forgot Password</title>
         <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
         <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div ></div>
                <div >

                <div class="container">
<div class='nav'>
    <div class='head'>
    Welcome to Web 3.0 - The Future
</div><button id='home'><a href='../home'>Home</a></button></div></div>


         <div class="infos"> <b class="headinfo">Forgot Password </b><br><p>Fill out your email to receive reset link</p></div>

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
                                $error .= "User Not Found";
                            }
                        }
                        if (0) {
                            echo $error;
                        } else {

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
                                echo "An email has been sent";
                            }
                        }
                    }
                    ?>
                    <form method="post" action="" name="reset">
                        

                        <div class="form-group">
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email" placeholder="username@email.com" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                        </div>
                    </form>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>