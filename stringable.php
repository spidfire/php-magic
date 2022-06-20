<?php


class Test1 {


}


class Test2{
    public function __toString()
    {
        return 'test2';
    }
}


$a = new Test1();
$b = new Test2();

var_dump($a instanceof Stringable);
var_dump($b instanceof Stringable);
