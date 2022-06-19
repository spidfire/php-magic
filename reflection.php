<?php

interface Test {


}

/**
 * Test class
 */
class TestClass implements Test{

    /** @var string Test */
    private string $testValue = '22';

    /**
     * This is test function
     * @return string
     */
    public function getTestValue(): string
    {
        return $this->testValue;
    }

    private function setTestValue(string $testValue): void
    {
        $this->testValue = $testValue;
    }
}



$reflection = new ReflectionClass(TestClass::class);
var_dump($reflection->getDocComment());
//string(23) "/**
// * Test class
// */"

var_dump($reflection->getFileName());
//string(46) "/home/djurre/projects/php-magic/reflection.php"

var_dump($reflection->getInterfaces());
//array(1) {
//    ["Test"]=>
//  object(ReflectionClass)#2 (1) {
//  ["name"]=>
//    string(4) "Test"
//  }
//}

var_dump($reflection->getMethods());
//    array(2) {
//        [0]=>
//      object(ReflectionMethod)#2 (2) {
//          ["name"]=>
//          string(12) "getTestValue"
//          ["class"]=>
//          string(9) "TestClass"
//      }
//      [1]=>
//      object(ReflectionMethod)#3 (2) {
//          ["name"]=>
//          string(12) "setTestValue"
//          ["class"]=>
//          string(9) "TestClass"
//      }
//    }


var_dump($reflection->getMethod('getTestValue')->getDocComment());
//string(65) "/**
//     * This is test function
//     * @return string
//     */"



#############################
// Alter private property


$instance = new TestClass();

var_dump($instance->getTestValue());
//string(2) "22"

$reflection = new ReflectionClass(TestClass::class);
$prop = $reflection->getProperty('testValue');
$prop->setAccessible(true); // enable that you can access this property (effectively put it to public)
$prop->setValue($instance, '81');


var_dump($instance->getTestValue());
//string(2) "81"


#############################
// Alter private method

$instance = new TestClass();

var_dump($instance->getTestValue());
//string(2) "22"

$reflection = new ReflectionClass(TestClass::class);
$method = $reflection->getMethod('setTestValue');
$method->setAccessible(true);
$method->invoke($instance, 44);


var_dump($instance->getTestValue());
//string(2) "44"
