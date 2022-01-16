<?php

class Login extends Dbh{

    protected function getUser($username,$pwd){

        // $sql = "SELECT `password` FROM `phptask` WHERE username = $username";
        $sql = "SELECT * FROM phptask WHERE username = ?;";
        $result = $this->connect()->prepare($sql);

        if(!$result->execute(array($username))) {
            $result = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }
        
        if($result->rowCount() == 0){
            $sql = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }else{

            $pass = $result->fetchAll(PDO::FETCH_ASSOC);
            if($pass[0]['password'] == md5($pwd)){
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $pwd;
                $_SESSION["email"] = $pass[0]['email'];
                $_SESSION["gender"] = $pass[0]['gender'];
                $_SESSION["phone"] = $pass[0]['phone'];
                $_SESSION["name"] = $pass[0]['name'];
                $_SESSION["changed"] = "nochanged";

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