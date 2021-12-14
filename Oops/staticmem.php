<?php

//we can call member function without creating object using static members
//constructor donot call in static
class class1{
    static public $sum=10;
    static public $num=5;
    static function fun1(){
        echo self::$sum;
    } 
    static function fun2(){
        echo self::$num;
    }
}

// $obj=new class1();
// echo $obj->fun1();
// echo "<br>";
// echo $obj->sum;
// echo class1::$sum;

echo class1::fun1();
echo "<br>";
echo class1::fun2();
?>