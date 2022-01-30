<!-- Document not in use -->
<?php
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

    $stmt = 'SELECT username FROM phptask WHERE username = ? OR email = ?;';
    $conn->query($stmt);
    $stmt->execute(array($username,$email));

    if($stmt->rowCount() > 0) {
        echo "User already Exist!";
    }
    
?>