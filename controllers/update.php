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

        $this->editUserInfo($this->username,$this->phone,$this->email,$this->gender,$this->name);
    }

}