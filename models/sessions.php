<?php
class Session{
    private static $mySession;

    function __construct(){
        session_start();
        self::$mySession = $_SESSION;
    }
    public static function getSession() {
        // session_start();
        if (!isset(self::$mySession)) {
            self::$mySession = new Session();
        }
        return self::$mySession;
    }
    public static function validateSession() {
        self::getSession();
        
        // self::$mySession
        if (!isset($_SESSION['userid'])) {
            header("location: ../login/index.php");
            die();
        }
    }
    public static function ifSession() {
        self::getSession();
        
        // self::$mySession
        if (isset($_SESSION['userid'])) {
            header("location: ../home");
            die();
        }
    }

    public static function setSession ($user) {
        self::getSession();
        self::$mySession->user['userid'] = $user->userid;
        self::$mySession->user['name'] = $user->name;
        self::$mySession->user['username'] = $user->username;
        self::$mySession->user['email'] = $user->email;
        self::$mySession->user['phone'] = $user->phone;
        self::$mySession->user['gender'] = $user->gender;

        $_SESSION['userid'] = $user->userid;
        $_SESSION['name'] = $user->name;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['phone'] = $user->phone;
        $_SESSION['gender'] = $user->gender;
    }

    public static function destroy(){
        self::getSession();
        // unset(self::$mySession);
        session_unset();
        session_destroy();
    }
}

?>