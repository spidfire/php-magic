<?php


$obj = new stdClass;
$weakref = WeakReference::create($obj);
var_dump($weakref->get());
//object(stdClass)#1 (0) {
//}
unset($obj);
var_dump($weakref->get());
//NULL



############################# php 8
/*
$wm = new WeakMap();

$o = new StdClass;

class A
{
    public function __destruct()
    {
        echo "Dead!\n";
    }
}

$wm[$o] = new A;

var_dump(count($wm));
//int(1)
echo "Unsetting...\n";
//Unsetting...
unset($o);
//Dead!
echo "Done\n";
//Done
var_dump(count($wm));
//int(0)

*/
