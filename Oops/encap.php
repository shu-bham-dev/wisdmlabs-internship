<?php
class  class1{
    protected $num;
    function __construct(){
        $this->num = 2;
    }
}
$obj = new class1();
echo $obj->num;
?>