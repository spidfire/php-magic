<?php


class MagicCountable implements Countable {


    public function count()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        return 22;
    }
}

$test = new MagicCountable();

var_dump($test->count());
//count([]) is called
//int(22)


var_dump(count($test));
//count([]) is called
//int(22)



class MagicUnCountable {


    public function count()
    {
        echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
        return 22;
    }
}



$test = new MagicUnCountable();

var_dump($test->count());
//count([]) is called
//int(22)

var_dump(count($test));
//PHP Warning:  count(): Parameter must be an array or an object that implements Countable in /home/djurre/projects/php-magic/countable.php on line 36
//int(1)

