<?php
include "../common.php";
class editUser extends Dbh{

    protected function editUserInfo($phone,$email,$gender,$name){
        
        // $password = $password;
        session_start();
        // echo $_SESSION["userid"];
        // die();
        $serialno = $_SESSION["userid"];
        $sql = "UPDATE `phptask` SET `name` = '$name' , `phone` = '$phone', `email` = '$email',`gender` ='$gender' WHERE `sno` = '$serialno'";
        $result = $this->connect()->prepare($sql);
        $result->execute();

        if(!($result->execute())){
            echo "<pre>";
            print_r($result->errorInfo());
            echo "Something went wrong!";
            exit();
        }else{
            // Session Updator
            $qry = "SELECT * FROM phptask WHERE sno = ?;";
            $res = $this->connect()->prepare($qry);
            $res->execute(array($serialno));
            $ary = $res->fetchAll(PDO::FETCH_ASSOC);
            $user = new stdClass();
                $user->userid = $ary[0]['sno'];
                $user->email = $ary[0]['email'];
                $user->phone = $ary[0]['phone'];
                $user->gender = $ary[0]['gender'];
                $user->name = $ary[0]['name'];
                $user->username = $ary[0]['username'];
                Session::setSession($user);
            // Session Updator End
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