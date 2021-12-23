<?php

class Signup extends Dbh{

    protected function setUser($username,$email,$password,$name,$phone,$gender){
        // $password = md5($password);
        $sql = "INSERT INTO `phptask` (`name`, `username`, `phone`, `gender`, `email`, `password`, `dt`) VALUES ('$name', '$username', '$phone', '$gender', '$email', '$password', current_timestamp())";
      
        $result = $this->connect()->prepare($sql);
        $result->execute();

        // if(!$stmt->execute(array($username,$email))){
        //     $stmt = null;
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }
    }
    
    protected function checkUser($username,$email){

        $stmt = $this->connect()->prepare('SELECT username FROM phptask WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username,$email))){
            $stmt = null;
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