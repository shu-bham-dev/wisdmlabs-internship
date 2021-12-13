<?php

abstract class bank{
    abstract function id_proof();
}

class hdfc extends bank{
    function test(){
        echo "Test";
    }
}

class icici extends bank{
    function test(){
        echo "Test";
    }
}

?>