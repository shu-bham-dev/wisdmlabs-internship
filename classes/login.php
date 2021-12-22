<?php

class Login extends Dbh{

    protected function getUser($username,$pwd){

        $sql = "SELECT `password` FROM `phptask` WHERE username = $username";
      
        $result = $this->connect()->prepare($sql);
        $result->execute();

        if($result->rowCount()==0){
            $sql = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $password = $result->fetchAll(PDO::FETCH_ASSOC);
        echo "$password";
        $checkpass = password_verify($pwd,$password[0]["password"]);

        if($checkpass == false){
            $sql = null;
            header("location: ../index.php?error=wrongpassword");
            exit();

        }else if($checkpass == true){
            $sql = "SELECT * FROM `phptask` WHERE username = $username";
            echo "Hi guys";
            session_start();   
        }

        // if(!$stmt->execute(array($username,$email))){
        //     $stmt = null;
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }
    }

}

?>