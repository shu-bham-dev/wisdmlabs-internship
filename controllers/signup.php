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
            // $message = "Username or Email already exist!";
            // echo "<script type='text/javascript'>
            // if (window.confirm('$message')){
            //     document.location = '../signup';
            // }else{
            //     document.location = '../home';
            // }
            // </script>";
            // $message = "Username or Email already exist!";
            // echo "<script type='text/javascript'>
            // document.getElementById('notified').innerHTML = 'User already exists';
            // </script>";
            session_start();
            $_SESSION['error'] = "User already exist";
            // echo "<style>center{ color: red;
            //     margin-top: 5.5em;
            //     position: absolute;
            //     font-size: 20px;
            //     width: 91em;}</style>
            //     <a href='../signup'>Back</a>
            //     <center>User already exist!</center>";
            header("location: ../signup");
            // exit();
            die();
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