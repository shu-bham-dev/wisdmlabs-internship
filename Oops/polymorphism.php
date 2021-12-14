<?php

//Same operation may be behave diffrently in diffl=rent class
//Abstarct Class
//Interface
class class1{
    function fun1(){
        echo "fun1";
    }
}

$obj = new class1;
$obj->fun1();
?>