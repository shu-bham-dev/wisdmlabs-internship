<?php
//inheritance doesnt aloowed multiple inhertinace.
//interface support multiple inheritence
// interface can only contain abstract function
// in interface we cannt define variable
// no constructor in interface
// all function must be public
interface class1{
    function test1();
}
interface class2{
    function test2();
}

class class3 implements class1,class2{
    function test1(){
        
    }
    function test2(){
        
    }
}



?>