<?php
class  class1{
    function __construct($y){
        echo $y;
        echo " <br>HI ";
    }
    function __destruct(){
        echo "BYE";
    }
}

$obj=new class1(55);


?>