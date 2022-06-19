<?php

class MagicClass {

    public $publicVar = 1234;
    private $privateVar = 223;
    public function __construct()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public function __destruct()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public function __call($name, $arguments)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public static function __callStatic($name, $arguments)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }


    public function __toString()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        return 'Some string';
    }

    public function __invoke()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public function __debugInfo()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public static function __set_state($an_array)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";

    }

    public function __clone()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public function __sleep()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public function __wakeup()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }

    public function __serialize(): array
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        return [];
    }

    public function __unserialize(array $data): void
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    }
}

MagicClass::hello('test');
// __callStatic(["hello",["test"]]) is called

$class = new MagicClass();
// __construct([]) is called

$class->test('something');
//__call(["test",["something"]]) is called

$class('invoke');
//__invoke(["invoke"]) is called

$copy = clone $class;
//__clone([]) is called


var_dump($class);
//__debugInfo([]) is called
//object(MagicClass)#1 (0) {
//}

// without __debugInfo
//object(MagicClass)#1 (2) {
//["publicVar"]=>
//  int(1234)
//  ["privateVar":"MagicClass":private]=>
//  int(223)
//}

unset($class);
//__destruct([]) is called

// automatic destruct of $copy on end of script
//__destruct([]) is called