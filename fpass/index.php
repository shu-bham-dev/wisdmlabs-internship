<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task - Forgot Password</title>
    <link rel="stylesheet" href="../login/style.css">
</head>
<body>
<div class="container">
         <div class="head">
            Welcome to Web 3.0 - The Future
         </div>

      <!-- REGISTRATION -- FORM -->
         <div class="signup-form">
            <form action="index.php" method="post">

               <label for="email">Enter your Email:</label>
               <input type="email" id="email" name="user_email">

               <button type="submit">Send me password</button>
            </form>
         </div>
      </div>
</body>
</html>

<?php

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if($_SERVER["REQUEST_METHOD"] == "POST"){

 
    // Grabbing the data
    $email = $_POST["user_email"];
 

    $server = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'phptask';
            $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password); 
    
    $sql = "SELECT * FROM phptask WHERE email = ?;";
    $result = $conn->prepare($sql);

    if(!$result->execute(array($email))) {
        $result = null;
        header("location: ../index.php?error=sqlfail");
        exit();
    }
    





    if($result->rowCount() == 0){
        $sql = null;
        header("location: ../index.php?error=emailnotfound");
        exit();
    }else{
        $pass = $result->fetchAll(PDO::FETCH_ASSOC);

        $pwd = $pass[0]['password'];
        $mail = new PHPMailer(true);

        try {
                                  //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'singhforbing@gmail.com';                     //SMTP username
            $mail->Password   = 'Shubham-sahu1@';                               //SMTP password
            $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('singhforbing@gmail.com', 'Mailer');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Reset Password";
            $mail->Body    = $pwd;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            $message = "Password is send successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        }
}
?>












<?php
    

class Sender{
    
    public function __construct($username,$email){
        $this->username = $username;
        $this->email = $email;
    }

    public function sendMail(){

    //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = 3;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'singhforbing@gmail.com';                     //SMTP username
                $mail->Password   = 'Shubham-sahu1@';                               //SMTP password
                $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('singhforbing@gmail.com', 'Mailer');
                $mail->addAddress($this->email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $this->username;
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo 'Message has been sent';
                header("location: ../home/index.php?error=none");


            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

    }

}

?>
