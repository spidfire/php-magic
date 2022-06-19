<?php


/**
 * @property string $test
 * @property-read string $test2
 * @property-write string $test3
 * From 8.2 and on #[AllowDynamicProperties]
 *
 */
class TestClass {
    private $data = [];

    public function __get($name)
    {
        echo __FUNCTION__ . "(".implode(', ', func_get_args()).") is called\n";
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        echo __FUNCTION__ . "(".implode(', ', func_get_args()).") is called\n";
        $this->data[$name] = $value;
    }
    public function __isset($name)
    {
        echo __FUNCTION__ . "(".implode(', ', func_get_args()).") is called\n";
        return array_key_exists($name, $this->data);
    }

    public function __unset($name)
    {
        echo __FUNCTION__ . "(".implode(', ', func_get_args()).") is called\n";
        unset($this->data[$name]);
    }
}





$c = new TestClass();


$c->test = 'yolo';
//__set(test, yolo) is called


var_dump(isset($c->test));
//__isset(test) is called
//bool(true)


var_dump(isset($c->somethingelse));
//__isset(somethingelse) is called
//bool(false)

var_dump(empty($c->emptyCheck));
//__isset(emptyCheck) is called
//bool(true)

var_dump($c->test);
//__get(test) is called
//string(4) "yolo"


unset($c->test);
//__unset(test) is called



var_dump($c->test);
//__get(test) is called
//PHP Notice:  Undefined index: test in /home/djurre/projects/php-magic/get_set.php on line 15
//NULL


