<?php

class SignupContr extends Signup{

    private $name;
    private $username;
    private $phone;
    private $email;
    private $password;
    private $con_password;

    public function __construct($name, $username, $phone, $email, $password, $con_password){

        $this->name = $name;
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->con_password = $con_password;
    }


    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: .. /index.php?error=emptyinput");
            exit();
        }
        
        if($this->pwdMatch() == false){
            header("location: .. /index.php?error=pwdMatch");
            exit();
        }

        if($this->usernameTakenCheck() == false){
            header("location: .. /index.php?error=usernameTakenCheck");
            exit();
        }

        $this->setUser($this->username,$this->email,$this->password,$this->name,$this->phone);
    }
    
    private function emptyInput(){
        $result;

        if(empty($this->name) || empty($this->username) || empty($this->phone) || empty($this->email) || empty($this->password) || empty($this->con_password)){
            
            $result = false;

        }else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result;
        if($this->password != $this->con_password){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
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