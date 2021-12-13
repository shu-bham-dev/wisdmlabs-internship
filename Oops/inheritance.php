<?php
class  class1{
    function __construct(){
        echo "Constructor 1 ";
    }
    function fun1(){
        echo "Fun1 ";
    }
}

class class2 extends class1{
    function __construct(){
        echo "Constructor 2 ";
        parent::__construct();
    }
}

// $obj1=new class1();
$obj2=new class2();
$obj2->fun1();

?>