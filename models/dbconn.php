<?php

class Dbh{
    protected function connect(){
        try {
            
            $server = 'localhost';
            $user = 'root';
            $password = 'Golden0-';
            $db = 'phptask';
            $conn = new PDO("mysql:host=$server; dbname=$db",$user, $password); 
            return $conn;         
        } catch (\Throwable $th) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
            
        }
    }
}
?>