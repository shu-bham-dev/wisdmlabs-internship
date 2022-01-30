<?php

class Signup extends Dbh{

    protected function setUser($username,$email,$password,$name,$phone,$gender){
        $password = md5($password);
        $sql = "INSERT INTO `phptask` (`name`, `username`, `phone`, `gender`, `email`, `password`, `dt`) VALUES ('$name', '$username', '$phone', '$gender', '$email', '$password', current_timestamp())";
      
        $result = $this->connect()->prepare($sql);
        if(!$result->execute()){
            echo "<pre>";
            print_r($result->errorInfo());
            print_r("STMT FAIL");
            exit();
        };
    }
    protected function returnUID($username){
        $sql = "SELECT * from phptask WHERE username = '$username' ";
      
        $result = $this->connect()->prepare($sql);
        if(!$result->execute()){
            echo "<pre>";
            print_r($result->errorInfo());
            print_r("STMT FAIL");
            exit();
        };
        $pass = $result->fetchAll(PDO::FETCH_ASSOC);
        return $pass[0]['sno'];
    }
    
    protected function checkUser($username,$email){

        $stmt = $this->connect()->prepare('SELECT username FROM phptask WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username,$email))){
            $stmt = null;
            $message = "Unable to check the user!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}

?>