<?php

class editUser extends Dbh{

    protected function editUserInfo($username,$phone,$email,$gender,$name){

        // $password = $password;
        $sql = "UPDATE `phptask` SET `name` = '$name' , `phone` = '$phone', `email` = '$email',`gender` ='$gender' WHERE `username` = '$username'";
        $result = $this->connect()->prepare($sql);
        // $result->execute();

        if(!($result->execute())){
              echo "Something went wrong!";
              exit();
        }else{
            $message = "Account Information is updated successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
      
        // $result = $this->connect()->prepare($sql);
        // $result->execute();
    
        // if(!$stmt->execute(array($username,$email))){
        //     $stmt = null;
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }
    }
}

?>