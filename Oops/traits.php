<?php

//Traits used to pass only useful class and members to the other memebers
/*
trait class1{
    function fun1(){
        echo "Traits1 <br>";
    }
}
class class2 extends class1{
    use class1;
    function fun2(){
        echo "Traits2 <br>";
    }
}
class class3 extends class2{
    function fun3(){
        echo "Traits3 <br>";
    }
}
class class4 extends class3{
    use class1;
    function fun4(){
        echo "Traits4 <br>";
    }
}

$obj = new class4;
echo $obj->fun1();
echo $obj->fun2();
echo $obj->fun3();
echo $obj->fun4();

*/

trait t1{
    function fun1(){
        echo "T1:Fun1";
    }
}
trait t2{
    function fun1(){
        echo "T2:Fun1";
    }
}

class class1{
    use t1,t2{
        t1::fun1 insteadOf t2;
        t2::fun1 as fun2;
    }
}

$obj=new class1;
$obj->fun1();
$obj->fun2();

// OP:-
// T1:Fun1T2:Fun1

?>