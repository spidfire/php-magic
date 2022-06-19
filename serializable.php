<?php

class MagicClass {

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



$class = new MagicClass();
// __construct([]) is called


$serialized = serialize($class);
//__serialize([]) is called

var_dump($serialized);
// O:10:"MagicClass":0:{}

unset($class);
//__destruct([]) is called


$restored = unserialize($serialized);
//__unserialize([[]]) is called


//__destruct([]) is called