<?php

class SignupContr extends Signup{

    private $name;
    private $username;
    private $phone;
    private $email;
    private $gender;
    private $password;
    private $con_password;

    public function __construct($name, $username, $phone, $email, $password, $con_password,$gender){

        $this->name = $name;
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
        $this->gender = $gender;
        $this->password = $password;
        $this->con_password = $con_password;
    }

    public function signupUser(){

        if($this->usernameTakenCheck() == false){
            $message = "Username is taken!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            // header("location: ../signup/index.php");
            exit();
        }

        $this->setUser($this->username,$this->email,$this->password,$this->name,$this->phone,$this->gender);
    }
    
    private function usernameTakenCheck(){
        $result;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}