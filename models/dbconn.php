<?php

class Dbh{
    protected function connect(){
        try {
            
            $server = 'localhost';
            $user = 'root';
            $password = '';
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