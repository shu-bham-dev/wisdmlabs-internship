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
            // session_start();
            // $_SESSION['error'] = "User already exist";
            // echo $_POST['user_name'];
            // header("location: ../signup");
            // // exit();
            // die();


            session_start();
            // validate data
            // valide name
            if(empty($_POST['user_name']) === true OR is_numeric($_POST['user_name']) === true){
                // generate error
                if(empty($_POST['user_name']) === true){
                    $_SESSION['validation_error']['user_name'] = 'Name is required';
                } else {
                    $_SESSION['validation_error']['user_name'] = 'Name must contain alphabets.';
                }
            }
            
            // validate phone
            if(empty($_POST['phone']) === true OR is_numeric($_POST['phone']) === false){
                if(empty($_POST['phone']) === true){
                    $_SESSION['validation_error']['phone'] = 'Phone number is required.';
                } else {
                    $_SESSION['validation_error']['phone'] = 'You have entered a non-numeric phone number, it must be numeric.';
                }
            }

            // validate username
            if(empty($_POST['user_username']) === true OR ( preg_match('/\s/',$_POST['user_username']) ) === false){
                if(empty($_POST['user_username']) === true){
                    $_SESSION['validation_error']['user_username'] = 'Username is required.';
                } else {
                    $_SESSION['validation_error']['user_username'] = 'Username can not have whitespace';
                }
            }

            // validate username
            if(empty($_POST['user_gender']) === true){
                $_SESSION['validation_error']['gender'] = 'Gender is required.';
            }

            //Email validate
            if(empty($_POST['user_email'])){
                $_SESSION['validation_error']['email'] = 'Email is required';
            }
            else if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['validation_error']['email'] = 'Invalid Email format';
            }

            //Password validate
            if(empty($_POST['user_password'])){
                $_SESSION['validation_error']['password'] = 'Please enter password';
            }
            //Same Password
            if($_POST['user_password'] != $_POST['user_cnf_password']){
                $_SESSION['validation_error']['user_cnf_password'] = 'Password do not match';
            }
            // End of validations
    
            if($this->usernameTakenCheck() == false){
                $_SESSION['error'] = "User already exist";
                echo $_POST['user_name'];
                $_SESSION['tempUser'] = (object)[
                    'user_name'         => $_POST['user_name'],
                    'user_username'     => $_POST['user_username'],
                    'phone'             => $_POST['phone'],
                    'user_gender'       => $_POST['user_gender'],
                    'user_email'        => $_POST['user_email'],
                    'user_password'     => $_POST['user_password'],
                    'user_cnf_password' => $_POST['user_cnf_password']
                ];
                header("location: ../signup");
                exit();
            }
    
    
            if(isset($_SESSION['tempUser']) === true){
                unset($_SESSION['tempUser']);
            }
            if(isset($_SESSION['validation_error']) === true){
                unset($_SESSION['validation_error']);
            }
            $this->setUser($this->username,$this->email,$this->password,$this->name,$this->phone,$this->gender);
            return $this->returnUID($this->username);
        }

        $this->setUser($this->username,$this->email,$this->password,$this->name,$this->phone,$this->gender);
        return $this->returnUID($this->username);
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