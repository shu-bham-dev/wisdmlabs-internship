<?php
class  class1{
    public $x = 1;
    function fun1(){
        return $this->x++;
    }
    function fun2(){
        echo "fun2";
    }
}

$obj=new class1();

$obj->fun1();
echo $obj->x;

?>