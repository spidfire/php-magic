<?php

// Closure  is a inline function
// https://www.php.net/manual/en/class.closure.php
// https://www.php.net/manual/en/functions.anonymous.php
// 7.4 https://www.php.net/manual/en/functions.arrow.php


$test = function ($test){


    var_dump($test);
    return "return $test";
};

var_dump($test);
//object(Closure)#1 (1) {
//["parameter"]=>
//  array(1) {
//    ["$test"]=>
//    string(10) "<required>"
//  }
//}

var_dump($test('test'));
//string(4) "test"
//string(11) "return test"

var_dump(call_user_func($test, 'test'));
//string(4) "test"
//string(11) "return test"



#############################

// 7.4 https://www.php.net/manual/en/functions.arrow.php

$short = fn($name) => "Hello {$name}";

echo $short('World'). "\n";
// Hello World


$outsideValue = 'v2';

$short2 = fn($name) => "Hello {$name} ($outsideValue)";

echo $short2('World'). "\n";
// Hello World (v2)

// NOTE: No outside can be changed so the following does not work:  $fn = fn() => $x++;


// Equals to
//$short2 = function ($name) use ($outsideValue) {
//  return "Hello {$name} ($outsideValue)"  ;
//};



#############################

class Value {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}

$test = function ($test){
    $this->value = $test;
};

$class = new Value('nothing');

var_dump($class->getValue());
// string(7) "nothing"

$test->call($class, 'test22');

var_dump($class->getValue());
// string(6) "test22"
