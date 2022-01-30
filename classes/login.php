<?php
include_once "../models/sessions.php";
class Login extends Dbh{

    protected function getUser($username,$pwd){

        // $sql = "SELECT `password` FROM `phptask` WHERE username = $username";
        $sql = "SELECT * FROM phptask WHERE username = ?;";
        $result = $this->connect()->prepare($sql);

        if(!$result->execute(array($username))) {
            $result = null;
            $message = "Server Error";
            echo "<script type='text/javascript'>alert('$message');</script>";
            // header("location: ../index.php?error=sqlfail");
            exit();
        }
        
        if($result->rowCount() == 0){
            $sql = null;
            
            // $message = "User not found!";
            // echo "<script type='text/javascript'>alert('$message');</script>";
            // echo "<script type='text/javascript'>
            // document.getElementById('errormsg').innerHTML = 'User Not Found!'; 
            // </script>";

            echo "<style>   center{ color: red;
            margin-top: 5.5em;
            position: absolute;
            font-size: 20px;
            width: 91em;}</style><center>User not found!</center>";

            // header("location: ../login");
            // exit();
        }
        else{

            $pass = $result->fetchAll(PDO::FETCH_ASSOC);
            if($pass[0]['password'] == md5($pwd)){
                $user = new stdClass();
                $user->userid = $pass[0]['sno'];
                $user->email = $pass[0]['email'];
                $user->phone = $pass[0]['phone'];
                $user->gender = $pass[0]['gender'];
                $user->name = $pass[0]['name'];
                $user->username = $pass[0]['username'];
                Session::setSession($user);
                // $_SESSION["username"] = $username;
                // $_SESSION["password"] = $pwd;
                // $_SESSION["gender"] = $pass[0]['gender'];
                // $_SESSION["phone"] = $pass[0]['phone'];
                // $_SESSION["name"] = $pass[0]['name'];
                // $_SESSION["userid"] = $pass[0]['sno'];
                // $_SESSION["changed"] = "nochanged";

                header("location: ../home");
            }else{
                $message = "Password is Wrong! Try Again";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }

        // $checkpass = password_verify($pwd,$alldata[0]["password"]);

        // if($checkpass == false){
        //     $sql = null;
        //     header("location: ../index.php?error=wrongpassword");
        //     exit();

        // }else if($checkpass == true){
        //     $sql = "SELECT * FROM `phptask` WHERE username = $username";
        //     echo "Hi guys";
        //     session_start();   
        // }

        // if(!$stmt->execute(array($username,$email))){
        //     $stmt = null;
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }
    }

}

?>