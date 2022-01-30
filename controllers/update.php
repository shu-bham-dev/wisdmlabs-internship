<?php

class UpdateUser extends editUser{

    private $name;
    private $username;
    private $phone;
    private $email;
    private $gender;
    // private $password;
    // private $con_password;

    public function __construct($name,$username,$phone,$email,$gender){

        $this->name = $name;
        $this->phone = $phone;
        $this->username = $username;
        $this->email = $email;
        // $this->password = $password;
        $this->gender = $gender;
    }

    public function editUsers(){
            session_start();
            // validate data
            // valide name
            if(empty($_POST['user_name']) === true OR preg_match('/\d/',$_POST['user_name']) === true){
                // generate error
                if(empty($_POST['user_name']) === true){
                    $_SESSION['update_error']['user_name'] = 'Name is required';
                } else {
                    $_SESSION['update_error']['user_name'] = 'Name must contain alphabets.';
                }
            }
            
            // if(!preg_match('!@#$%&*()+,-./:;<=>?[]^_`{|}', $_POST['user_name']) OR !preg_match('!@#$%&*()+,-./:;<=>?[]^_`{|}', $_POST['user_username'])){

            //     if(!preg_match('!@#$%&*()+,-./:;<=>?[]^_`{|}', $_POST['user_name'])){
            //         $_SESSION['update_error']['user_name'] = 'Name can not contain special characters';

            //     }

            //     else if(!preg_match('!@#$%&*()+,-./:;<=>?[]^_`{|}', $_POST['user_username'])){
            //         $_SESSION['update_error']['user_username'] = 'Username can not contain special characters';
            //     }
            // }
            
            
            // validate phone
            if(empty($_POST['phone']) === true OR is_numeric($_POST['phone']) === false){
                if(empty($_POST['phone']) === true){
                    $_SESSION['update_error']['phone'] = 'Phone number is required.';
                } else {
                    $_SESSION['update_error']['phone'] = 'You have entered a non-numeric phone number, it must be numeric.';
                }
            }

            // validate username
            if(empty($_POST['user_username']) === true OR ( preg_match('/\s/',$_POST['user_username']) ) === false){
                if(empty($_POST['user_username']) === true){
                    $_SESSION['update_error']['user_username'] = 'Username is required.';
                } else {
                    $_SESSION['update_error']['user_username'] = 'Username can not have whitespace';
                }
            }

            // validate username
            if(empty($_POST['user_gender']) === true){
                $_SESSION['update_error']['gender'] = 'Gender is required.';
            }

            //Email validate
            if(empty($_POST['user_email'])){
                $_SESSION['update_error']['email'] = 'Email is required';
            }
            else if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['update_error']['email'] = 'Invalid Email format';
            }

            //Password validate
            if(empty($_POST['user_password'])){
                $_SESSION['update_error']['password'] = 'Please enter password';
            }
            
            //Same Password
            if($_POST['user_password'] != $_POST['user_cnf_password']){
                $_SESSION['update_error']['user_cnf_password'] = 'Password do not match';
            }
            // End of validations

        $this->editUserInfo($this->phone,$this->email,$this->gender,$this->name);
    }

}