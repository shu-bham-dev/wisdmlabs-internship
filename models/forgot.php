<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/phpTask/fpass/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    
    $expires = date("U") + 1800; 

    function connect(){
        try {
            $server = 'localhost';
            $user = 'root';
            $password = 'Golden0-';
            $db = 'phptask';
            $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password); 
            return $conn;         
        } catch (\Throwable $th) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die(); 
        }
    }

    $userEmail = $_POST["user_email"];

    $sql = "DELETE FROM pwdReser WHERE pwdResetEmail=?";
    $result = connect()->prepare($sql);

    // if(!$result->execute(array($userEmail))) {
    //     $message = "Server Error";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    //     // header("location: ../index.php?error=sqlfail");
    //     exit();
    // }



    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $result = connect()->prepare($sql);

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);

    if(!$result->execute(array("ssss",$userEmail,$selector,$hashedToken,$expires))) {
        $message = "Server Error";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // header("location: ../index.php?error=sqlfail");
        exit();
    }


    $to = $userEmail;
    $subject = 'Reset Password';
    $message = '<p> Reset your password using below link-';
    $message .= 'Click Here';
    $message .= '<a href="' . $url . '</a>';
    

    mail($to, $subject,$message);








// require '../vendor/autoload.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;


// if($_SERVER["REQUEST_METHOD"] == "POST"){
 

//    $email = $_POST["user_email"];
//    include_once "../models/dbconn.php";

//    include_once "../controllers/mail.php";
//    $sendMail = new forgotPass($email);
//    $sendMail->sendMails();
   
}
?>