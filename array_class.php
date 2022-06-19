<?php

class MagicArray implements ArrayAccess {

    private $dataStore = [];

    public function offsetExists($offset)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        return array_key_exists($offset, $this->dataStore);
    }

    public function offsetGet($offset)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        return $this->dataStore[$offset];
    }

    public function offsetSet($offset, $value)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        $this->dataStore[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        unset($this->dataStore[$offset]);
    }
}

$test = new MagicArray();

var_dump(isset($test['test']));
//offsetExists(["test"]) is called
//bool(false)

$test['test'] = 22;
//offsetSet(["test",22]) is called

var_dump(isset($test['test']));
//offsetExists(["test"]) is called
//bool(true)

var_dump($test['test']);
//offsetGet(["test"]) is called
//int(22)

unset($test['test']);
//offsetUnset(["test"]) is called

var_dump(isset($test['test']));
//offsetExists(["test"]) is called
//bool(false)

